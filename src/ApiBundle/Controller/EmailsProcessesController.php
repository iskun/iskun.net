<?php

namespace ApiBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use DataBundle\Entity\Users;
use Facebook\Facebook;
use JMS\Serializer\SerializationContext;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\HttpFoundation\Response;
use ZBateson\MailMimeParser\MailMimeParser;

class EmailsProcessesController extends Controller {

    /**
     * @Route("/test", name="test")
     */
    public function testAction(Request $request) {
        $em = $this->getDoctrine()->getEntityManager();
        $file = $request->request->get('email');
        $name = time() . "_" . rand(1, 999999) . ".mail";
        $temp = "/www/iskun.net/web/emails/" . $name;
        $myfile = fopen($temp, "w") or die("Unable to open file!");
        fwrite($myfile, $file);
        fclose($myfile);
        $email = new \DataBundle\Entity\Emails();
        $email->setFilePath($name);
        $em->persist($email);
        $em->flush();
        $this->parseEmailAction($email->getId());
    }

    /**
     * @Route("/parse-email/{id}", name="parse-email")
     */
    public function parseEmailAction($id) {
        $em = $this->getDoctrine()->getEntityManager();
        $email = $em->getRepository("DataBundle:Emails")->find($id);

        $buffer = fopen("/www/iskun.net/web/emails/" . $email->getFilePath(), 'r');
        $mailParser = new \ZBateson\MailMimeParser\MailMimeParser();
        $message = $mailParser->parse($buffer);
        fclose($buffer);
        // Tìm địa chỉ email có đúng không?
        $to = $message->getHeaderValue('X-Original-To');
        $from = $message->getHeaderValue('From');
        $toAddress=$this->getInternalEmaillAddress($to);
        $fromAddress=$this->getInternalEmaillAddress($from);
        if (!$toAddress){
            // địa chỉ email không tồn tại gửi mail báo hỏng
            $this->forward('ApiBundle:Email:send', array("type" => "bounce_email_address", "data" => array("from" => $from,"to"=>$to,"message-id"=>$message->getHeaderValue('Message-ID'),"domain"=>$domainname)));
            die();
        }

        $email->setToEmailsAddresses($toAddress);
        $email->setToUsers($toAddress->getUsers());
        $email->setSubject($message->getHeaderValue('subject'));
        $email->setMessageId($message->getHeaderValue('Message-ID'));
        $email->setDeliveryTime(time());
        $email->setIsRead(0);
        $email->setFromName(explode("@", $to)[0]);
        if ($message->getHtmlStream()) {
            $email->setContent(stream_get_contents($message->getHtmlStream()));
        } else {
            if ($message->getTextStream()) {
                $email->setContent(stream_get_contents($message->getTextStream()));
            }
        }
        $cc = $message->getHeader('Cc');
        preg_match_all("'<(.*?)>'si", $cc, $matchs);
        if($matchs)
        {
            foreach ($matchs[1] as $match)
            {
                $ccs[]=rtrim(ltrim($match,"<"),">");
            }
        }
        if(isset($ccs)) {
            $email->setCC(json_encode($ccs));
        }
       
        
        $em->persist($email);
        $em->flush();
        if($message->getAttachmentCount()>0)
        {
            for($i=0;$i<$message->getAttachmentCount();$i++)
            {
                $att = $message->getAttachmentPart($i); 
                $fileName=  time()."_".$att->getHeader('Content-Type')->getParts()[1]->getValue();
                $temp = "/www/iskun.net/web/emails_attachments/" .$fileName;
                $myfile = fopen($temp, "w") or die("Unable to open file!");
                fwrite($myfile, stream_get_contents($att->getContentResourceHandle()));
                fclose($myfile);
                $attachment = new \DataBundle\Entity\EmailsAttachments();
                $attachment->setEmails($email);
                $attachment->setFilePath($fileName);
                $attachment->setFileName($att->getHeader('Content-Type')->getParts()[1]->getValue());
                $attachment->setFileFormat($att->getHeaderValue('Content-Type'));
                $em->persist($attachment);
                $em->flush();
            }
        }
        die();
        echo $message->getHeaderValue('from');          // user@example.com
        echo $message->getHeader('from')->getPersonName();    // Person Name
        echo $message->getHeaderValue('subject');       // The email's subject
        $res = $message->getHtmlStream();               // or getHtmlStream
        echo stream_get_contents($res);
        echo $message->getAttachmentCount();
        $att = $message->getAttachmentPart(0);          // first attachment
        echo "<pre>";
        print_r($att->getHeader('x-attachment-id')->getRawValue());
        echo "</pre>";


        echo $att->getHeaderValue('Content-Type');      // text/plain for instance
        echo $att->getHeaderParameter(// value of "charset" part
                'content-type', 'charset'
        );


        die();
    }
    public function getInternalEmaillAddress($to){ 
        $em = $this->getDoctrine()->getEntityManager();
        $tos = explode("@", $to);
        $address = $tos[0]; $domainname=$tos[1];
        $domain=$em->getRepository("DataBundle:Domains")->findOneByName($domainname); 
        if($domain)
        {
        $emailaddress = $em->getRepository("DataBundle:emailsaddresses")->findOneBy(array("address"=>$address,"domains"=>$domain->getId()));
        return $emailaddress;
        }
        else{
           return false;
        }
        
    }

}

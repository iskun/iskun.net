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
        $config = $em->getRepository("DataBundle:Configurations")->find(1);
        $email = $em->getRepository("DataBundle:Emails")->find($id);

        foreach ($email->getEmailsAttachments() as $attachment) {
            if ($attachment->getFiles()->getFilePath() != "") {
                $filepath = "/www/iskun.net/web" . $attachment->getFiles()->getFilePath();
                if (file_exists($filepath)) {
                    unlink($filepath);
                }
            }
            if ($attachment->getFiles()->getThumbnail() != "") {
                $thumbnail = "/www/iskun.net/web" . $attachment->getFiles()->getThumbnail();
                if (file_exists($thumbnail)) {
                    unlink($thumbnail);
                }
            }

            foreach ($attachment->getFiles()->getPreviews() as $pre) {
                if ($pre->getFilePath() != "") {
                    $preview = "/www/iskun.net/web" . $pre->getFilePath();
                    if (file_exists($preview)) {
                        unlink($preview);
                    }
                }
                $em->remove($pre);
                $em->flush();
            }
            $em->remove($attachment);
            $em->flush();
            $em->remove($attachment->getFiles());
            $em->flush();
        }

        $buffer = fopen("/www/iskun.net/web/emails/" . $email->getFilePath(), 'r');
        $mailParser = new \ZBateson\MailMimeParser\MailMimeParser();
        $message = $mailParser->parse($buffer);
        fclose($buffer);
        // Tìm địa chỉ email có đúng không?
        $to = $message->getHeaderValue('X-Original-To');
        if ($to == "returnmessageid@iskun.net") {

            $id = $message->getHeaderValue('id');

            $old_email = $em->getRepository("DataBundle:Emails")->find($id);
            $mid = $message->getHeaderValue('message-id');
            $old_email->setMessageId($mid);
            $em->persist($old_email);
            $em->flush();

            if (file_exists("/www/iskun.net/web/emails/" . $email->getFilepath())) {
                unlink("/www/iskun.net/web/emails/" . $email->getFilepath());
            }
            $em->remove($email);
            $em->flush();
            die();
        }

        $from = $message->getHeaderValue('From');
        $toAddress = $this->getInternalEmaillAddress($to);
        $fromAddress = $this->getInternalEmaillAddress($from);
        if (!$toAddress) {
            // địa chỉ email không tồn tại gửi mail báo hỏng
            $this->forward('ApiBundle:Email:send', array("type" => "bounce_email_address", "data" => array("from" => $from, "to" => $to, "message-id" => $message->getHeaderValue('Message-ID'), "domain" => $domainname)));
            die();
        }
        if ($message->getHeaderValue('in-reply-to')) {
            $email->setReplyTo($em->getRepository("DataBundle:Emails")->findOneBy(array("message_id" => $message->getHeaderValue('in-reply-to'))));
        }
        $email->setFromAddress($from);
        $email->setToAddress($to);
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
        if ($matchs) {
            foreach ($matchs[1] as $match) {
                $ccs[] = rtrim(ltrim($match, "<"), ">");
            }
        }
        if (isset($ccs)) {
            $email->setCC(json_encode($ccs));
        }


        $em->persist($email);
        $em->flush();
        if ($message->getAttachmentCount() > 0) {
            for ($i = 0; $i < $message->getAttachmentCount(); $i++) {
                $att = $message->getAttachmentPart($i);
                $fileName = $att->getHeader('Content-Type')->getParts()[1]->getValue();
                $segments = explode(".", $fileName);
                $ext = $segments[(count($segments) - 1)];
                $newName = md5(time() . rand(1000000, 9000000)) . "." . $ext;
                $temp = "/www/iskun.net/web/attachments/" . $config->getCurrentFolder() . "/" . $newName;
                $myfile = fopen($temp, "w") or die("Unable to open file!");
                fwrite($myfile, stream_get_contents($att->getContentResourceHandle()));
                fclose($myfile);
                $file = new \DataBundle\Entity\Files();
                $file->setFilename($fileName);
                $file->setFilepath("/attachments/" . $config->getCurrentFolder() . "/" . $newName);
                $file->setUsers($toAddress->getUsers());
                $file->setFormat($att->getHeaderValue('Content-Type'));
                $file->setExtension($ext);
                $file->setTime(time());
                $em->persist($file);
                $em->flush();
                $this->forward('ApiBundle:Api:generatePreviews', array("id" => $file->getId()));
                $attachment = new \DataBundle\Entity\EmailsAttachments();
                $attachment->setEmails($email);
                $attachment->setFiles($file);
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

    public function getInternalEmaillAddress($to) {
        $em = $this->getDoctrine()->getEntityManager();
        $tos = explode("@", $to);
        $address = $tos[0];
        $domainname = $tos[1];
        $domain = $em->getRepository("DataBundle:Domains")->findOneByName($domainname);
        if ($domain) {
            $emailaddress = $em->getRepository("DataBundle:emailsaddresses")->findOneBy(array("address" => $address, "domains" => $domain->getId()));
            return $emailaddress;
        } else {
            return false;
        }
    }

    /**
     * @Route("/test2", name="test2")
     */
    public function test2Action(Request $request) {
        $headers = 'From: hotro@iskun.net' . "\r\n";
        $headers .= "Id: 123456" . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        mail("luuanhquyen@gmail.com", "1", "2", $headers);
    }

    public function curl($url) {
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $url);
        curl_setopt($c, CURLOPT_FOLLOWLOCATION, true);  // Follow the redirects (needed for mod_rewrite)
        curl_setopt($c, CURLOPT_HEADER, false);         // Don't retrieve headers
        curl_setopt($c, CURLOPT_NOBODY, true);          // Don't retrieve the body
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);  // Return from curl_exec rather than echoing
        curl_setopt($c, CURLOPT_FRESH_CONNECT, true);   // Always ensure the connection is fresh
        curl_setopt($c, CURLOPT_TIMEOUT, 1);
        return curl_exec($c);
    }

    public function generatePreviews($id) {
        // Convert chỉ sử dụng máy Local không sử dụng server
        $em = $this->getDoctrine()->getEntityManager();
        $config = $em->getRepository("DataBundle:Configurations")->find(1);
        $file = $em->getRepository("DataBundle:Files")->find($id);

        if (in_array($file->getExtension(), array("doc", "docx", "ppt", "pptx", "pdf"))) {
            $feed = "http://" . $config->getConverterip() . "/converter/?file=" . $file->getFilepath() . "&callback=returnThumbnailsFile&id=" . $id . "";
            $data = $this->curl($feed);
            mail("luuanhquyen@gmail.com", "request converted  office file " . $id, $feed);
        }
        if (in_array(strtolower($file->getExtension()), array("jpg", "png", "bmp"))) {
            $filename = $file->getFilename();
            $filename = str_replace("." . $file->getExtension(), "", $filename);
            $filename = md5($filename . time()) . ".jpg";

            // resize preview
            $imagick = new \Imagick("/www/iskun.net/web" . $file->getFilepath());
            $imagick->setImageFormat('jpg');
            $imagick->resizeImage(800, 800, \imagick::FILTER_LANCZOS, 0.9, true);
            $imagick->writeImage('/www/iskun.net/web/previews/' . $config->getCurrentFolder() . '/' . $filename);
            $imagick->destroy();
            $preview = new \DataBundle\Entity\Previews();
            $preview->setFiles($file);
            $preview->setFilepath("/previews/" . $config->getCurrentFolder() . '/' . $filename);
            $preview->setPage(1);
            $em->persist($preview);
            $em->flush();

            // tao file thumbnail
            $imagick2 = new \Imagick("/www/iskun.net/web/" . $file->getFilepath());
            $imagick2->setImageFormat('jpg');
            $imagick2->setbackgroundcolor('rgb(64, 64, 64)');
            $imagick2->cropThumbnailImage(300, 300);
            $imagick2->setImageCompression(\Imagick::COMPRESSION_JPEG);
            $imagick2->setImageCompressionQuality(75);
            $imagick2->stripImage();
            $imagick2->writeImage('/www/iskun.net/web/thumbnails/' . $config->getCurrentFolder() . '/' . $filename);
            $imagick2->destroy();
            $file->setThumbnail("/thumbnails/" . $config->getCurrentFolder() . "/" . $filename);
            $em->persist($file);
            $em->flush();
        }
    }

    /**
     * @Route("/returnThumbnailsFile/{id}/{filename}/{pages}", name="generate-files-thumbnails")  
     */
    public function returnThumbnailsFileAction($id, $filename, $pages) {
        $em = $this->getDoctrine()->getEntityManager();
        $config = $em->getRepository("DataBundle:Configurations")->find(1);
        $ip = $config->getConverterIp();
        $file = $em->getRepository("DataBundle:Files")->find($id);
        foreach ($file->getPreviews() as $pre) {
            // $em->remove($pre);
            //$em->flush(); 
        }
        for ($i = 0; $i < $pages; $i++) {
            $p = ($i + 1);
            $preview = $em->getRepository("DataBundle:Previews")->findOneBy(array("files" => $file->getId(), "page" => $p));
            if ($preview) {
                continue;
            }
            $url = "http://" . $config->getConverterip() . "/converter/returnThumbnailsFile/" . $filename . "_" . $i . ".jpg";
            $content = @file_get_contents($url);
            if (!$content) {
                echo "exit";
                die();
            }
            $myfile = fopen("/www/iskun.net/web/previews/" . $config->getCurrentFolder() . "/" . $filename . "_" . $i . ".jpg", "w") or die("Unable to open file!");
            fwrite($myfile, $content);
            fclose($myfile);
            $preview = new \DataBundle\Entity\Previews();
            $preview->setFiles($file);
            $preview->setFilepath("/previews/" . $config->getCurrentFolder() . "/" . $filename . "_" . $i . ".jpg");
            $preview->setPage($p);
            $em->persist($preview);
            $em->flush();

            if ($i == 0) {
                $imagick = new \Imagick("/www/iskun.net/web/previews/" . $config->getCurrentFolder() . "/" . $filename . "_" . $i . ".jpg");
                $imagick->setImageFormat('jpg');
                $imagick->setbackgroundcolor('rgb(64, 64, 64)');
                $imagick->cropThumbnailImage(300, 300);
                $imagick->setImageCompression(\Imagick::COMPRESSION_JPEG);
                $imagick->setImageCompressionQuality(75);
                $imagick->stripImage();
                $name = $filename . ".jpg";
                $imagick->writeImage('/www/iskun.net/web/thumbnails/' . $config->getCurrentFolder() . '/' . $name);
                $imagick->destroy();
                $file->setThumbnail("/thumbnails/" . $config->getCurrentFolder() . "/" . $name);
                $em->persist($file);
                $em->flush();
            }
        }
        echo "done";
        die();
    }

}

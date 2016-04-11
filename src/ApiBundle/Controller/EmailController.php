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

class EmailController extends Controller {

    public function sendAction($type, $data, $user) {
        $headers = 'From: Hỗ trợ Iskun <hotro@iskun.net>' . "\r\n";
        $headers.= 'Reply-To: luanhquyen@gmail.com' . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        if ($type == "facebook_register") {
            $to = $user->getEmail();
            $title = $user->getFullname() . ", tài khoản của bạn tại Iskun.Net";
            $content = $this->renderView('ApiBundle::facebook_register.html.twig',array("user"=>$user,"data"=>$data));
        }
        if ($type == "user-set-type") {
        if ($data['type']=="teacher") {$vtype="giáo viên";}
        if ($data['type']=="student") {$vtype="học sinh";}
            $to = $user->getEmail();
            $title = $user->getFullname() . ", thiết lập tài khoản ".$vtype." tại Iskun.Net";
            $content = $this->renderView('ApiBundle::user-set-type-'.$data['type'].'.html.twig',array("user"=>$user,"data"=>$data));
        }
        mail($to, $title, $content, $headers);
        return json_encode(array('status' => "sent"));
    }

}

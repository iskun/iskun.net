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

    public function sendAction($type, $data=array(), $user=false) {
        $headers = 'From: hotro@iskun.net' . "\r\n"; 
        

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
        if ($type == "bounce_email_address") {
          //  $headers .= "X-Failed-Recipients: ".$data['to']."". "\r\n";
            $headers .= "Delivered-To: ".$data['from']."\r\n"; 
            $headers .= "In-Reply-To: ".$data['message-id']. "\r\n";
            $headers .= "References: ".$data['message-id']. "\r\n"; 
            $headers .= "Return-Path: taolao@iskun.net". "\r\n"; 
             
            
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
            $to = $data['from']; 
            $title = "Gửi thư không thành công"; 
            $content = $this->renderView('ApiBundle::bounce_email_address.html.twig',array("data"=>$data));
        }
        mail($to, $title, $content, $headers);
        return json_encode(array('status' => "sent"));
    }

}

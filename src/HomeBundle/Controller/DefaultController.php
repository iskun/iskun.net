<?php

namespace HomeBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Facebook\Facebook;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
class DefaultController extends Controller
{
    
    /**
     * @Route("/{slug}", name="pre_router") 
     */
    public function preRouteAction(Request $request,$slug)
    { 
        $em = $this->getDoctrine()->getEntityManager();
        $slugs=$em->getRepository("DataBundle:Slugs")->findOneBy(array("slug"=>$slug));
        if($slugs->getEntity()=="schools")
        {
            return $this->forward('TeacherBundle:Default:school',array('request'=>$request));
        }
    }
    
    
    
    /**
     * @Route("/", name="home") 
     */
    public function indexAction(Request $request)
    { 
     
        $auth_checker = $this->get('security.authorization_checker');
        if($auth_checker->isGranted('ROLE_TEACHER'))
        {
            return $this->forward('TeacherBundle:Default:index',array('request'=>$request));
        }
        if($auth_checker->isGranted('ROLE_USER'))
        {
            return $this->forward('UserBundle:Default:index',array('request'=>$request));
        }
        if($auth_checker->isGranted('ROLE_STUDENT'))
        {
            return $this->forward('StudentBundle:Default:index',array('request'=>$request));
        }
        return $this->forward('HomeBundle:Default:guest',array('request'=>$request));
    }
    
    
    
    public function guestAction(){
        return $this->render('HomeBundle::guest.html.twig', [
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ]);
    }
    
    /**
     * @Route("/facebookLoginButton/{redirect}", name="fbButton")
     */
    public function fbLoginButtonAction(Request $request,$redirect)
    {
        $fb =  new Facebook([
            'app_id' => '379273575598190',
            'app_secret' => '8ac96ca853850f8e634b814d7c478cb4',   
            'default_graph_version' => 'v2.5',
          ]);
        $helper = $fb->getRedirectLoginHelper(); 
        $permissions = ['email','user_birthday']; // Optional permissions 
        $facebook['loginUrl'] = $helper->getLoginUrl('http://iskun.net/fbCallback?redirect='.$redirect, $permissions); 

        return $this->render('HomeBundle::fbButton.html.twig', [
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
            'loginUrl' => $facebook['loginUrl'],
         ]);
    } 
    /**
     * @Route("/fbCallback", name="fbCallback")
     */ 
    public function fbCallbackAction(Request $request)
    {
        $redirect=$request->query->get('redirect');
        
        $fb = new Facebook([
            'app_id' => '379273575598190',
            'app_secret' => '8ac96ca853850f8e634b814d7c478cb4',
            'default_graph_version' => 'v2.5',
        ]);
        $helper = $fb->getRedirectLoginHelper();
        try {
            $accessToken = $helper->getAccessToken();
        } catch (Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }
        try {
            // Returns a `Facebook\FacebookResponse` object
            $response = $fb->get('/me?fields=id,name,email,gender,birthday,location,hometown', $accessToken);
        } catch (Facebook\Exceptions\FacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        $fbuser = $response->getGraphUser();
        $user = $this->getDoctrine()->getRepository("DataBundle:Users")->findOneByEmail($fbuser['email']);
        $em = $this->getDoctrine()->getEntityManager();
        if ($user) {
            $user->setLastlogin(time());
            $em->persist($user);
            $em->flush();
        } else {
            $password = rand(100000, 999999);

            $user = new Users();
            $user->setFullname($fbuser['name']);
            if(isset($fbuser['gender']))
            {
            $user->setGender($fbuser['gender']);
            }
            if(isset($fbuser['birthday']))
            {
            $user->setBirthday($fbuser['birthday']);
            }
            $user->setEmail($fbuser['email']);
            $user->setUsername($fbuser['email']);
            $user->setPassword(password_hash($password, PASSWORD_BCRYPT));
            $user->setToken(password_hash($fbuser['email'], PASSWORD_BCRYPT));
            $user->setCreateTime(time());
            $user->setLastlogin(time());
            $user->setActive(1);
            $em->persist($user);
            $em->flush();
            $url = 'http://graph.facebook.com/' . $fbuser['id'] . '/picture?type=large';
            $data = file_get_contents($url);
            $fileName = '/www/beeship.com/web/avatars/' . $user->getId() . '.jpg';
            $file = fopen($fileName, 'w+');
            fputs($file, $data);
            fclose($file);
            $user->setAvatar($user->getId() . '.jpg');
            $em->persist($user);
            $em->flush();
            $data = $this->forward('ApiBundle:Email:send', array("type" => "facebook_register", "data" => array("password" => $password), "user" => $user));
        }
        $token = new UsernamePasswordToken($user, null, 'main', $user->getRoles()); 
        $this->get('security.token_storage')->setToken($token);
        
        if (!$redirect)
        {
        return $this->redirectToRoute('home', array(), 301);
        }
        else{
           return $this->redirect($redirect); 
        }
    }
    
    /**
     * @Route("/navbar", name="navbar")
     */ 
    public function navbarAction(Request $request,$redirect)
    {

        return $this->render('HomeBundle::layout::navbar.html.twig', [
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),

         ]);
    } 
    
    /**
     * @Route("/quick_login", name="quick_login")
     */ 
    public function quickLoginAction(Request $request)
    {
        $redirect=$request->query->get('redirect');
        return $this->render('HomeBundle::login/login.html.twig', [
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
            'redirect' => $redirect 
         ]);
    } 
    
    /**
     * @Route("/updateConverterIp", name="updateConverterIp")
     */
    public function updateConverterIpAction(Request $request) {
        $em = $this->getDoctrine()->getEntityManager();
        $configurations=$em->getRepository("DataBundle:Configurations")->find(1);
        $configurations->setConverterIp($request->getClientIp());
        $em->persist($configurations);
        $em->flush();
        return $this->render('HomeBundle::updateIp.html.twig', [
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
         ]);
    }
}

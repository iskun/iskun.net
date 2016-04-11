<?php

namespace TeacherBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Facebook\Facebook;
use Unoconv\Unoconv;

class DefaultController extends Controller {

    public function indexAction($request) {

        $data['page'] = "home";
        return $this->render('TeacherBundle::index/index.html.twig', [
                    'base_dir' => realpath($this->container->getParameter('kernel.root_dir') . '/..'),
                    'user' => $this->getUser(),
                    'request' => $request,
                    "data" => $data
        ]);
    }

    /**
     * @Route("/tai-nguyen", name="tai-nguyen")
     */
    public function resourcesAction(Request $request) {
        
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_TEACHER')) {
            return $this->redirectToRoute('quick_login', array("redirect" => $_SERVER["REQUEST_URI"]), 301);
        }
        return $this->render('TeacherBundle::resources/resources.html.twig', [
                    'base_dir' => realpath($this->container->getParameter('kernel.root_dir') . '/..'),
                    'user' => $this->getUser(),
        ]);
    }

    /**
     * @Route("/de-thi", name="de-thi")
     */
    public function testsAction(Request $request) {
        return $this->render('TeacherBundle::index.html.twig', [
                    'base_dir' => realpath($this->container->getParameter('kernel.root_dir') . '/..'),
                    'user' => $this->getUser(),
        ]);
    }

    /**
     * @Route("/navbar", name="navbar")
     */
    public function navbarAction(Request $request) {

        return $this->render('TeacherBundle::layout/navbar.html.twig', [
                    'base_dir' => realpath($this->container->getParameter('kernel.root_dir') . '/..'),
                    'request' => $request
        ]);
    }

    /**
     * @Route("/footer", name="navbar")
     */
    public function footerAction(Request $request) {

        return $this->render('TeacherBundle::layout/footer.html.twig', [
                    'base_dir' => realpath($this->container->getParameter('kernel.root_dir') . '/..'),
                    'request' => $request
        ]);
    }

    /**
     * @Route("/profile", name="profile")
     */
    public function profileAction(Request $request) {

        return $this->render('TeacherBundle::layout/profile.html.twig', [
                    'base_dir' => realpath($this->container->getParameter('kernel.root_dir') . '/..'),
                    'request' => $request,
                    'user' => $this->getUser(),
        ]);
    }

    /**
     * @Route("/getModal/teacher/{template}", name="get-modal")  
     */
    public function getModalAction(Request $request, $template) {

        return $this->render('TeacherBundle::modal/' . $template . '.html.twig', [
                    'base_dir' => realpath($this->container->getParameter('kernel.root_dir') . '/..'),
                    'user' => $this->getUser(),
        ]);
    }

    /**
     * @Route("/test", name="test")
     */
    public function testAction(Request $request) {
        $command="convert /www/iskun.net/web/docs/php.pdf /www/iskun.net/web/docs/luu_%03d.jpg";
        shell_exec($command);
        die();
        return $this->render('TeacherBundle::index.html.twig', [
                    'base_dir' => realpath($this->container->getParameter('kernel.root_dir') . '/..'),
                    'user' => $this->getUser(),
        ]);
    }
    
    
    
    

}

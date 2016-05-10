<?php

namespace TeacherBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Facebook\Facebook;
use Unoconv\Unoconv;
use PhpImap\Mailbox as ImapMailbox;
use PhpImap\IncomingMail;
use PhpImap\IncomingMailAttachment;

class DefaultController extends Controller {

    public function indexAction($request) {
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_TEACHER')) {
            return $this->redirectToRoute('quick_login', array("redirect" => $_SERVER["REQUEST_URI"]), 301);
        }
        $data['page'] = "home";
        return $this->render('TeacherBundle::index/index.html.twig', [
                    'base_dir' => realpath($this->container->getParameter('kernel.root_dir') . '/..'),
                    'user' => $this->getUser(),
                    'request' => $request,
                    "data" => $data
        ]);
    }

    /**
     * @Route("{slug}/tai-nguyen", name="giao-vien-tai-nguyen")
     */
    public function resourcesAction(Request $request, $slug) {

        if (!$this->get('security.authorization_checker')->isGranted('ROLE_TEACHER')) {
            return $this->redirectToRoute('quick_login', array("redirect" => $_SERVER["REQUEST_URI"]), 301);
        }
        return $this->render('TeacherBundle::resources/index.html.twig', [
                    'base_dir' => realpath($this->container->getParameter('kernel.root_dir') . '/..'),
                    'user' => $this->getUser(),
        ]);
    }

    /**
     * @Route("{slug}/de-thi", name="giao-vien-de-thi")
     */
    public function testsAction(Request $request) {
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_TEACHER')) {
            return $this->redirectToRoute('quick_login', array("redirect" => $_SERVER["REQUEST_URI"]), 301);
        }
        return $this->render('TeacherBundle::tests/index.html.twig', [
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
                    'request' => $request,
                    'user' => $this->getUser(),
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
     * @Route("{slug}/profile", name="profile")
     */
    public function profileAction(Request $request) {
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_TEACHER')) {
            return $this->redirectToRoute('quick_login', array("redirect" => $_SERVER["REQUEST_URI"]), 301);
        }
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
     * @Route("{slug}/truong-hoc", name="giao-vien-truong-hoc")
     */
    public function schoolsAction(Request $request) {
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_TEACHER')) {
            return $this->redirectToRoute('quick_login', array("redirect" => $_SERVER["REQUEST_URI"]), 301);
        }
        return $this->render('TeacherBundle::schools/index.html.twig', [
                    'base_dir' => realpath($this->container->getParameter('kernel.root_dir') . '/..'),
                    'user' => $this->getUser(),
        ]);
    }

    /**
     * @Route("{slug}/cau-hoi", name="giao-vien-cau-hoi")
     */
    public function questionsAction(Request $request) {
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_TEACHER')) {
            return $this->redirectToRoute('quick_login', array("redirect" => $_SERVER["REQUEST_URI"]), 301);
        }
        return $this->render('TeacherBundle::questions/index.html.twig', [
                    'base_dir' => realpath($this->container->getParameter('kernel.root_dir') . '/..'),
                    'user' => $this->getUser(),
        ]);
    }

    /**
     * @Route("{slug}/hom-thu", name="giao-vien-hom-thu")
     */
    public function mailboxAction(Request $request, $slug) {

        if (!$this->get('security.authorization_checker')->isGranted('ROLE_TEACHER')) {
            return $this->redirectToRoute('quick_login', array("redirect" => $_SERVER["REQUEST_URI"]), 301);
        }
        return $this->render('TeacherBundle::mailbox/index.html.twig', [
                    'base_dir' => realpath($this->container->getParameter('kernel.root_dir') . '/..'),
                    'user' => $this->getUser(),
        ]);
    }

    

}

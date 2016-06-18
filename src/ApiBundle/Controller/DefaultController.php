<?php

namespace ApiBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use DataBundle\Entity\Users;
use DataBundle\Entity\Slugs;
use DataBundle\Entity\UsersWalls;
use Facebook\Facebook;
use JMS\Serializer\SerializationContext;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\Tools\Pagination\Paginator;

class DefaultController extends Controller {

    /**
     * @Route("/api/user", name="api-get-user")
     */
        public function getUserAction() {
        $em = $this->getDoctrine()->getEntityManager();
        $user = $this->getUser();  
        $serializer = $this->container->get('serializer');
        $user = $serializer->serialize($user, 'json', SerializationContext::create()->setGroups(array('full'))->enableMaxDepthChecks());
        $user = json_decode($user, true);
        $response= new Response(json_encode($user));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

}

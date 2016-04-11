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

class UsersController extends Controller {

    public function timeoutAction() {
        $data = array("error" => "timeout");
        $response = new Response(json_encode($data));
        $response->headers->set('Content-Type', 'application/json');
        $response->setStatusCode(401);
        return $response;
    }

    public function loginFacebookAction(Request $request) {
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
            $user->setGender($fbuser['gender']);
            $user->setBirthday($fbuser['birthday']);
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
            $fileName = '/www/iskun.net/web/avatars/' . $user->getId() . '.jpg';
            $file = fopen($fileName, 'w+');
            fputs($file, $data);
            fclose($file);
            $user->setAvatar($user->getId() . '.jpg');
            $em->persist($user);
            $em->flush();
            $slug = $this->slug($fbuser['name']);
            for ($i = 0; $i <= 1000; $i++) {
                $newslug = $slug;
                if ($i >= 1) {
                    $newslug = $slug . "-" . $i;
                }
                $exist = $this->getDoctrine()->getRepository("DataBundle:Slugs")->findOneBySlug($newslug);
                if (!$exist) {
                    $slugs = new \DataBundle\Entity\Slugs();
                    $slugs->setSlug($newslug);
                    $slugs->setEntity("Users");
                    $em->persist($slugs);
                    $em->flush();
                    $user->setSlugs($slugs);
                    $em->persist($user);
                    $em->flush();
                    break;
                }
            }

            $data = $this->forward('ApiBundle:Email:send', array("type" => "facebook_register", "data" => array("password" => $password, "slugs" => $slugs), "user" => $user));
        }
        $token = new UsernamePasswordToken($user, null, 'main', $user->getRoles());
        $this->get('security.token_storage')->setToken($token);
        return $this->redirectToRoute('home', array(), 301);
    }

    public function typeAction(Request $request) {
        $user = $this->getUser();
        if ($request->get("type") == "teacher") {
            $user->setType("teacher");
        }
        if ($request->get("type") == "student") {
            $user->setType("student");
        }
        if ($request->get("type") == "parent") {
            $user->setType("parent");
        }
        $em = $this->getDoctrine()->getEntityManager();
        $em->persist($user);
        $em->flush();
        $this->forward('ApiBundle:Email:send', array("type" => "user-set-type", "data" => array("type" => $request->get("type")), "user" => $user));
        $token = new UsernamePasswordToken($user, null, 'main', $user->getRoles());
        $this->get('security.token_storage')->setToken($token);
        $serializer = $this->container->get('serializer');
        $data = $serializer->serialize($user, 'json', SerializationContext::create()->setGroups(array('basic')));
        return new Response($data);
    }

    public function slug($str, $char = "-") {
        $unicode = array(
            'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
            'd' => 'đ',
            'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
            'i' => 'í|ì|ỉ|ĩ|ị',
            'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
            'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
            'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
            'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'D' => 'Đ',
            'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'I' => 'Í|Ì|Ỉ|Ĩ|Ị',
            'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
            '-' => ' ',
            '' => ':',
            '' => "'",
        );

        foreach ($unicode as $nonUnicode => $uni) {

            $str = preg_replace("/($uni)/i", $nonUnicode, $str);
        }
        // Lower case the string and remove whitespace from the beginning or end
        $str = trim(strtolower($str));

        // Remove single quotes from the string
        $str = str_replace("'", "", $str);

        // Every character other than a-z, 0-9 will be replaced with a single dash (-)
        $str = preg_replace("/[^a-z0-9]+/", $char, $str);

        // Remove any beginning or trailing dashes
        $str = trim($str, $char);

        return $str;
    }

    public function getAction() {
        $em = $this->getDoctrine()->getEntityManager();
        $user = $this->getUser();
        $serializer = $this->container->get('serializer');
        $user = $serializer->serialize($user, 'json', SerializationContext::create()->setGroups(array('full'))->enableMaxDepthChecks());
        $user = json_decode($user, true);
        $folders = $em->getRepository("DataBundle:Folders")->findBy(array('parent' => null, 'users' => $this->getUser()->getId()));
        $folders = $serializer->serialize($folders, 'json', SerializationContext::create()->setGroups(array('basic'))->enableMaxDepthChecks());
        $folders = json_decode($folders, true);
        $user['folders'] = $folders;
        $questionstypes = $em->getRepository("DataBundle:QuestionsTypes")->findAll();
        $questionstypes = $serializer->serialize($questionstypes, 'json', SerializationContext::create()->setGroups(array('basic'))->enableMaxDepthChecks());
        $questionstypes = json_decode($questionstypes, true);
        $user['questionstypes'] = $questionstypes;
        $response= new Response(json_encode($user));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    public function postsAction($page, $min, $max) {
        // hàm lấy ra các post cho timeline
        if (!$this->getUser()) {
            return $this->timeoutAction();
        }
        $where = " WHERE ";
        if ($page == "home") {
            $where.=" w.home = 1 ";
        }
        if ($page == "private") {
            $where.=" w.private = 1 ";
        }
        if ($min > 0) {
            $where.=" AND w.id < $min ";
        }
        $em = $this->getDoctrine()->getEntityManager();
        $dql = "SELECT w FROM DataBundle:UsersWalls w $where ORDER BY w.id DESC ";
        $query = $em->createQuery($dql)
                ->setFirstResult(0)
                ->setMaxResults(10);
        $posts = new Paginator($query, $fetchJoinCollection = true);
        $older = array();
        foreach ($posts as $index => $post) {

            $older[] = $post;
        }
        $serializer = $this->container->get('serializer');
        $older = $serializer->serialize($older, 'json', SerializationContext::create()->setGroups(array('basic')));
        $older = json_decode($older);
        $olders = array();
        foreach ($older as $index => $post) {
            $dql = "SELECT c FROM DataBundle:Comments c LEFT JOIN c.posts p WHERE c.status='finish' AND p.id=" . $post->posts->id . " ORDER BY c.id DESC";
            $comments = $em->createQuery($dql)->setFirstResult(0)->setMaxResults(5)->getResult();
            $comments = $serializer->serialize($comments, 'json', SerializationContext::create()->setGroups(array('basic')));
            $comments = json_decode($comments, true);
            $comments = array_reverse($comments);
            $post->posts->comments = $comments;
            $dql = "SELECT c FROM DataBundle:Comments c LEFT JOIN c.posts p LEFT JOIN c.users u WHERE c.status='temporary' AND p.id=" . $post->posts->id . " AND u.id=" . $this->getUser()->getId() . " ORDER BY c.id DESC";
            $temporaryComment = $em->createQuery($dql)->setFirstResult(0)->setMaxResults(1)->getResult();
            $temporaryComment = $serializer->serialize($temporaryComment, 'json', SerializationContext::create()->setGroups(array('basic')));
            $temporaryComment = json_decode($temporaryComment, true);
            if (isset($temporaryComment[0])) {
                $temporaryComment = $temporaryComment[0];
            }
            $post->posts->comment = $temporaryComment;
            $olders[] = $post;
        }
        $data['olders'] = $older;
        $response = new Response(json_encode($data));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    public function postCommentsAction($id, $min, $max) {
        if (!$this->getUser()) {
            return $this->timeoutAction();
        }
        $where = "";
        if ($min > 0) {
            $where.=" AND c.id < $min";
        }
        $em = $this->getDoctrine()->getEntityManager();
        $serializer = $this->container->get('serializer');
        $dql = "SELECT c FROM DataBundle:Comments c LEFT JOIN c.posts p WHERE p.id=" . $id . " $where ORDER BY c.id DESC";
        $comments = $em->createQuery($dql)->setFirstResult(5)->setMaxResults(10)->getResult();
        $comments = $serializer->serialize($comments, 'json', SerializationContext::create()->setGroups(array('basic')));
        $comments = json_decode($comments, true);
        //$comments= array_reverse($comments);
        $data['olders'] = $comments;
        $response = new Response(json_encode($data));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    public function uploadCommentFileAction(Request $request) {
        if (!$this->getUser()) {
            return $this->timeoutAction();
        }
        $em = $this->getDoctrine()->getEntityManager();
        $id = $request->get("post");
        $content = $request->get("content");
        $commentId = $request->get("comment");
        if ($commentId) {
            $comment = $em->getRepository("DataBundle:Comments")->find($commentId);
        } else {
            $comment = $em->getRepository("DataBundle:Comments")->findOneBy(array('status' => "temporary", 'posts' => $id, 'users' => $this->getUser()->getId()));
        }
        if (!$comment) {
            $comment = new \DataBundle\Entity\Comments();
            $comment->setPosts($em->getRepository("DataBundle:Posts")->find($id));
            $comment->setIp($request->getClientIp());
            $comment->setUsers($this->getUser());
            $comment->setContent($content);
            $comment->setStatus("temporary");
            $comment->setLikes(0);
            $em->persist($comment);
            $em->flush();
        }
        $comment->setContent($content);
        $comment->setStatus("temporary");
        $comment->setTime(time());
        $comment->setLikes(0);
        $em->persist($comment);
        $em->flush();
        if ($_FILES['file']['name']) {
            if (!$_FILES['file']['error']) {
                $name = md5(rand(100, 200));
                $ext = explode('.', $_FILES['file']['name']);
                $filename = $name . '.' . $ext[1];
                $destination = '/www/iskun.net/web/files/' . $filename; //change this directory
                $location = $_FILES["file"]["tmp_name"];
                move_uploaded_file($location, $destination);
                $file = new \DataBundle\Entity\Files();
                $file->setFilename($_FILES['file']['name']);
                $file->setFilepath($filename);
                $file->setFormat($_FILES['file']['type']);
                $file->setThumbnail();
                $file->setUsers($this->getUser());
                $file->setSize($_FILES['file']['size']);
                $em->persist($file);
                $em->flush();
                $file->setThumbnail($this->createFileThumbnailAction($file->getId()));
                $em->persist($file);
                $em->flush();
                $commentfile = new \DataBundle\Entity\CommentsFiles();
                $commentfile->setComments($comment);
                $commentfile->setFiles($file);
                $em->persist($commentfile);
                $em->flush();
            }
        }
        $em->refresh($comment);
        $em->flush();
        $serializer = $this->container->get('serializer');
        $comment = $serializer->serialize($comment, 'json', SerializationContext::create()->setGroups(array('basic')));
        $response = new Response($comment);
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    public function deleteCommentAttachmentAction($commentId, $fileId) {
        $em = $this->getDoctrine()->getEntityManager();
        $comment = $em->getRepository("DataBundle:Comments")->find($commentId);
        foreach ($comment->getCommentsFiles() as $commentFile) {
            if ($fileId == $commentFile->getId()) {
                $file = $commentFile->getFiles();
                $em->remove($commentFile);
                $em->flush();
                // trước khi xóa file phải kiểm tra file có attach tới 1 post hoặc comment nào khác.
                // $em->remove($file);
                // $em->flush();
            }
        }
        $em->refresh($comment);
        $em->flush();
        $serializer = $this->container->get('serializer');
        $comment = $serializer->serialize($comment, 'json', SerializationContext::create()->setGroups(array('basic')));
        $response = new Response($comment);
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    public function postCommentAction($postId, Request $request) {
        if (!$this->getUser()) {
            return $this->timeoutAction();
        }
        $em = $this->getDoctrine()->getEntityManager();
        $content = $request->getContent();
        $inputs = json_decode($content, true); // 2nd param to get as array
        if (isset($inputs['id'])) {
            $comment = $em->getRepository("DataBundle:Comments")->find($inputs['id']);
            $comment->setContent($inputs['content']);
            $comment->setStatus("finish");
            $comment->setUsers($this->getUser());
            $em->persist($comment);
            $em->flush();
        } else {
            $comment = new \DataBundle\Entity\Comments();
            $comment->setPosts($em->getRepository("DataBundle:Posts")->find($postId));
            $comment->setContent($inputs['content']);
            $comment->setStatus("finish");
            $comment->setUsers($this->getUser());
            $comment->setTime(time());
            $em->persist($comment);
            $em->flush();
        }
        $em->refresh($comment);
        $em->flush();
        $serializer = $this->container->get('serializer');
        $comment = $serializer->serialize($comment, 'json', SerializationContext::create()->setGroups(array('basic')));
        $response = new Response($comment);
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    public function deleteCommentAction($commentId) {
        $em = $this->getDoctrine()->getEntityManager();
        $comment = $em->getRepository("DataBundle:Comments")->find($commentId);
        foreach ($comment->getCommentsFiles() as $commentfile) {
            $em->remove($commentfile);
            $em->flush();
        }
        $em->remove($comment);
        $em->flush();
        $response = new Response(json_encode(array("status" => "deleted")));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    public function createFileThumbnailAction($id) {
        $em = $this->getDoctrine()->getEntityManager();
        $file = $em->getRepository("DataBundle:Files")->find($id);
        if (in_array($file->getFormat(), array("image/jpeg", "image/png"))) {
            $imagick = new \Imagick("/www/iskun.net/web/files/" . $file->getFilepath());
            $imagick->setImageFormat('jpg');
            $imagick->setbackgroundcolor('rgb(64, 64, 64)');
            $imagick->cropThumbnailImage(300, 300);
            $imagick->setImageCompression(\Imagick::COMPRESSION_JPEG);
            // Set compression level (1 lowest quality, 100 highest quality)
            $imagick->setImageCompressionQuality(75);
            // Strip out unneeded meta data
            $imagick->stripImage();
            // Writes resultant image to output directory
            $name = md5(rand(100, 200)) . ".jpg";
            $imagick->writeImage('/www/iskun.net/web/thumbnail/' . $name);
            // Destroys Imagick object, freeing allocated resources in the process
            $imagick->destroy();
            return $name;
        }
    }

    public function dumpAction(Request $request) {
        phpinfo();
        die();
        $em = $this->getDoctrine()->getEntityManager();
        $dql = "SELECT c FROM DataBundle:Comments c";
        $comments = $em->createQuery($dql)->setFirstResult(0)->getResult();
        foreach ($comments as $comment) {
            //$em->remove($comment);
            // $em->flush();
        }
        $dql = "SELECT p FROM DataBundle:Posts p ORDER BY p.id DESC";
        $posts = $em->createQuery($dql)->setFirstResult(0)->setMaxResults(200)->getResult();
        foreach ($posts as $post) {
            //  $post->setCommentsnumber(0);
            //  $em->persist($post);
            //  $em->flush();
        }

        $dql = "SELECT p FROM DataBundle:Posts p ORDER BY p.id DESC";
        $posts = $em->createQuery($dql)->setFirstResult(3)->setMaxResults(10)->getResult();
        foreach ($posts as $post) {
            for ($i = 1; $i <= rand(1, 15); $i++) {
                $comment = new \DataBundle\Entity\Comments();
                $comment->setContent("Comment thứ " . $i . " post thứ " . $post->getId());
                $comment->setPosts($post);
                $comment->setTime(time());
                $comment->setUsers($em->getRepository("DataBundle:Users")->find(rand(1, 4)));
                $em->persist($comment);
                $em->flush();
                $post->setCommentsnumber($i);
                $em->persist($post);
                $em->flush();
            }
        }

        die();

        for ($i = 2; $i <= 200; $i++) {
            $post = new \DataBundle\Entity\Posts();
            $post->setContent("Đây là bài viết thứ " . $i);
            $post->setTime(time());
            $post->setIp($request->getClientIp());
            $post->setTitle("Tiêu đề bài viết thứ " . $i);
            $post->setUsers($em->getRepository("DataBundle:Users")->find(1));
            $post->setPoststypes($em->getRepository("DataBundle:PostsTypes")->find(1));
            $em->persist($post);
            $em->flush();
            $postclass = new \DataBundle\Entity\PostsClasses();
            $postclass->setPosts($post);
            $postclass->setClasses($em->getRepository("DataBundle:Classes")->find(1));
            $em->persist($postclass);
            $em->flush();
            $userwall = new UsersWalls();
            $userwall->setPosts($post);
            $userwall->setUsers($this->getUser());
            $userwall->setHome(1);
            $userwall->setPrivate(1);
            $em->persist($userwall);
            $em->flush();
        }
    }

    public function logoutAction() {
        $this->get('security.token_storage')->setToken(null);
        $this->get('request')->getSession()->invalidate();
        $data = array("logout" => "true");
        $response = new Response(json_encode($data));
        $response->headers->set('Content-Type', 'application/json');
        $response->setStatusCode(200);
        return $response;
    }

    public function reloginFacebookAction(Request $request) {
        $em = $this->getDoctrine()->getEntityManager();
        $content = $request->getContent();
        $inputs = json_decode($content, true);
        $user = $em->getRepository("DataBundle:Users")->findOneByEmail($inputs['email']);
        if (!$user) {
            $response = new Response(json_encode(array("error" => "noneexist")));
            $response->headers->set('Content-Type', 'application/json');
            return $response;
        }
        if ($user->getToken() == $inputs['token']) {
            $token = new UsernamePasswordToken($user, null, 'main', $user->getRoles());
            $this->get('security.token_storage')->setToken($token);
            $serializer = $this->container->get('serializer');
            $user = $serializer->serialize($user, 'json', SerializationContext::create()->setGroups(array('basic')));
            $response = new Response($user);
            $response->headers->set('Content-Type', 'application/json');
            return $response;
        } else {
            $response = new Response(json_encode(array("error" => "invalidtoken")));
            $response->headers->set('Content-Type', 'application/json');
            return $response;
        }
    }

    public function createFolderAction(Request $request, $id = false) {
        $em = $this->getDoctrine()->getEntityManager();
        if (!$this->getUser()) {
            return $this->timeoutAction();
        }
        $content = $request->getContent();
        $inputs = json_decode($content, true);
        $folder = new \DataBundle\Entity\Folders();
        $folder->setName($inputs['name']);
        $folder->setSlug($this->slug($inputs['name']));
        $folder->setUsers($this->getUser());
        if ($id) {
            $folder->setParent($em->getRepository("DataBundle:Folders")->find($id));
        }
        $em->persist($folder);
        $em->flush();

        $response = new Response(json_encode(array("status" => "success")));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    public function getFolderFilesAction($id = false) {
        $em = $this->getDoctrine()->getEntityManager();

        if ($id) {
            $condition['folders'] = $id;
            $files = $em->getRepository("DataBundle:Files")->findBy($condition);
        } else {
            $condition['users'] = $this->getUser()->getId();
            $condition['folders'] = null;
            $files = $em->getRepository("DataBundle:Files")->findBy($condition);
        }

        $serializer = $this->container->get('serializer');
        $files = $serializer->serialize($files, 'json', SerializationContext::create()->setGroups(array('basic')));
        $response = new Response($files);
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    public function uploadFileAction(Request $request) {
        if (!$this->getUser()) {
            return $this->timeoutAction();
        }
        $em = $this->getDoctrine()->getEntityManager();
        $id = $request->get("folder");
        if ($_FILES['file']['name']) {
            if (!$_FILES['file']['error']) {
                $name = md5(rand(100, 200));
                $ext = explode('.', $_FILES['file']['name']);
                $filename = $name . '.' . $ext[1];
                $destination = '/www/iskun.net/web/files/' . $filename; //change this directory
                $location = $_FILES["file"]["tmp_name"];
                move_uploaded_file($location, $destination);
                $file = new \DataBundle\Entity\Files();
                $file->setFilename($_FILES['file']['name']);
                $file->setFilepath($filename);
                $file->setFormat($_FILES['file']['type']);
                $file->setThumbnail("");
                $file->setUsers($this->getUser());
                $file->setSize($_FILES['file']['size']);
                $file->setTime(time());
                if ($id) {
                    $file->setFolders($em->getRepository("DataBundle:Folders")->find($id));
                }
                $em->persist($file);
                $em->flush();
                $file->setThumbnail($this->createFileThumbnailAction($file->getId()));
                $em->persist($file);
                $em->flush();
            }
        }
        return $this->getFolderFilesAction($id);
    }

    public function getStagesSubjectsAction() {
        $em = $this->getDoctrine()->getEntityManager();
        $stages=$em->getRepository("DataBundle:Stages")->findAll();
        $serializer = $this->container->get('serializer');
        $stages = $serializer->serialize($stages, 'json', SerializationContext::create()->setGroups(array('full')));
        $response = new Response($stages);
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
    public function addTeachingSubjectsAction(Request $request){
        $content = $request->getContent();
        $inputs = json_decode($content, true);
        $em = $this->getDoctrine()->getEntityManager();
        $ts = $em->getRepository("DataBundle:TeachingSubjects")->findBy(array('subjects' => $inputs['id'], 'users' => $this->getUser()->getId()));
        if (!$ts)
        {
        $ts = new \DataBundle\Entity\TeachingSubjects();
        $ts->setSubjects($em->getRepository("DataBundle:Subjects")->find($inputs['id']));
        $ts->setUsers($this->getUser());
        $em->persist($ts);
        $em->flush();
        }
        $response = new Response(json_encode(array("status"=>"success")));
        $response->headers->set('Content-Type', 'application/json');
        return $response; 
    }
    public function getQuestionsAction($source,$subject,$chapter,$questiontype,$page){
        $em = $this->getDoctrine()->getEntityManager();
        $where["subjects"]=$subject;
        $dql="SELECT q FROM DataBundle:Questions q JOIN q.subjects s JOIN q.subjectschapters c JOIN q.questionstypes qt JOIN q.users u WHERE s.id = ".$subject;
        if($chapter>0) {$dql.=" AND c.id=".$chapter;}
        if($questiontype>0) {$dql.=" AND qt.id=".$questiontype;}
        if($source=="private") {$dql.=" AND u.id=".$this->getUser()->getId();}
        if($source=="network") {$dql.=" AND q.share=2";}
        if($source=="friends") {$dql.=" AND q.share>1 AND u.id IN (1,2,3)";}
        $allQuestions = $em->createQuery($dql)->getResult();

        $query = $em->createQuery($dql)->setFirstResult(($page-1)*50)->setMaxResults(50);
        $questions = new Paginator($query, $fetchJoinCollection = true);
        $aQuestions=array();
        foreach ($questions as $question)
        {
            $aQuestions[]=$question;
        }
        

        $serializer = $this->container->get('serializer');
        $jQuestions = $serializer->serialize($aQuestions, 'json', SerializationContext::create()->setGroups(array('full')));
        $aQuestions=  json_decode($jQuestions,true);
        $data['questions']=$aQuestions;
        $data['total']=count($allQuestions);
        $data['itemsperpage']=50;
        $data['currentpage']=$page;
        $data['pages']=ceil($data['total']/$data['itemsperpage']);
        $response = new Response(json_encode($data));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
    
}

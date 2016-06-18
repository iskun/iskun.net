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

class ApiController extends Controller {

    /**
     * @Route("/api/getFilesFormats", name="api-get-filesformats")
     */
    public function getFilesFormatsAction() {
        $em = $this->getDoctrine()->getEntityManager();
        $formats = $em->getRepository("DataBundle:FilesFormats")->findAll();
        $serializer = $this->container->get('serializer');
        $formats = $serializer->serialize($formats, 'json', SerializationContext::create()->setGroups(array('basic')));
        $response = new Response($formats);
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    /**
     * @Route("/api/getFilesCategories", name="api-get-filescategories")
     */
    public function getFilesCategoriesAction() {
        $em = $this->getDoctrine()->getEntityManager();
        $formats = $em->getRepository("DataBundle:FilesCategories")->findAll();
        $serializer = $this->container->get('serializer');
        $formats = $serializer->serialize($formats, 'json', SerializationContext::create()->setGroups(array('basic')));
        $response = new Response($formats);
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    /**
     * @Route("/api/getSharings", name="api-get-sharings")
     */
    public function getSharingsAction() {
        $em = $this->getDoctrine()->getEntityManager();
        $formats = $em->getRepository("DataBundle:Sharings")->findAll();
        $serializer = $this->container->get('serializer');
        $formats = $serializer->serialize($formats, 'json', SerializationContext::create()->setGroups(array('basic')));
        $response = new Response($formats);
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    /**
     * @Route("/api/addResource", name="api-add-resource")
     */
    public function addResourceAction(Request $request) {
        $em = $this->getDoctrine()->getEntityManager();
        $content = $request->getContent();
        $inputs = json_decode($content, true);
        $inputs = $inputs['resource'];
        $errors = array();
        if (!isset($inputs['filter']['subjects']['id'])) {
            $errors['filter']['subjects'] = "Chọn môn học";
        }
        if (!isset($inputs['filter']['subjectschapters']['id'])) {
            $errors['filter']['subjectschapters'] = "Chọn chương";
        }

        if (!isset($inputs['filter']['sharings']['id'])) {
            $errors['filter']['sharings'] = "Chọn chia sẻ";
        }
        if ($inputs['title'] == "") {
            $errors['title'] = "Nhập tiêu đề tài nguyên";
        }
        if (count($inputs['files']) == 0) {
            $errors['files'] = "Bạn cần tải tệp cho tài nguyên";
        } else {
            foreach ($inputs['files'] as $file) {
                if ($file['filescategories']['id'] == "") {
                    $errors['files'] = "Chọn phân loại tư liệu cho tất cả các tệp";
                }
            }
        }
        if (count($errors) == 0) {
            $resource = new \DataBundle\Entity\Posts();
            $resource->setTitle($inputs['title']);
            $resource->setContent($inputs['content']);
            $resource->setTime(time());
            $resource->setLikesnumbers(0);
            $resource->setCommentsnumbers(0);
            $resource->setIp($request->getClientIp());
            $resource->setUsers($this->getUser());
            $resource->setPoststypes($em->getRepository("DataBundle:PostsTypes")->find(1));
            $resource->setSharings($em->getRepository("DataBundle:Sharings")->find($inputs['filter']['sharings']['id']));
            $em->persist($resource);
            $em->flush();

            $postsubject = new \DataBundle\Entity\PostsSubjects();
            $postsubject->setSubjects($em->getRepository("DataBundle:Subjects")->find($inputs['filter']['subjects']['id']));
            if (isset($inputs['filter']['subjectschapters']['id'])) {
                $postsubject->setSubjectschapters($em->getRepository("DataBundle:SubjectsChapters")->find($inputs['filter']['subjectschapters']['id']));
            }
            $postsubject->setPosts($resource);
            $em->persist($postsubject);
            $em->flush();

            foreach ($inputs['files'] as $file) {

                $ofile = $em->getRepository("DataBundle:Files")->find($file['id']);
                $ofile->setSubjects($em->getRepository("DataBundle:Subjects")->find($inputs['filter']['subjects']['id']));
                if (isset($inputs['filter']['subjectschapters']['id'])) {
                    $ofile->setSubjectschapters($em->getRepository("DataBundle:SubjectsChapters")->find($inputs['filter']['subjectschapters']['id']));
                }
                $em->persist($ofile);
                $em->flush();
                $postfile = new \DataBundle\Entity\PostsFiles();
                $postfile->setFiles($ofile);
                $postfile->setPosts($resource);
                $em->persist($postfile);
                $em->flush();
                $ofile = $em->getRepository("DataBundle:Files")->find($file['id']);
                $ofile->setFilescategories($em->getRepository("DataBundle:FilesCategories")->find($file['filescategories']));
                $em->persist($ofile);
                $em->flush();
            }
            $em->refresh($resource);
            $em->flush();
            $serializer = $this->container->get('serializer');
            $resource = $serializer->serialize($resource, 'json', SerializationContext::create()->setGroups(array('basic')));
            $result['resource'] = json_decode($resource, true);
        }
        $result['errors'] = $errors;
        $response = new Response(json_encode($result));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    /**
     * @Route("/api/getResources", name="api-get-resources")
     */
    public function getResourcesAction(Request $request) {
        $em = $this->getDoctrine()->getEntityManager();
        $content = $request->getContent();
        $inputs = json_decode($content, true);
        $dql = "SELECT p FROM DataBundle:Posts p ";
        $query = $em->createQuery($dql)
                ->setFirstResult(0)
                ->setMaxResults(20);
        $files = $query->getResult();
        $serializer = $this->container->get('serializer');
        $result = $serializer->serialize($files, 'json', SerializationContext::create()->setGroups(array('basic')));
        $response = new Response($result);
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    /**
     * @Route("/api/uploadFile", name="api-upload-file")
     */
    public function uploadFileAction() {
        if (!$this->getUser()) {
            return $this->timeoutAction();
        }
        $em = $this->getDoctrine()->getEntityManager();
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
                $em->persist($file);
                $em->flush();
                $serializer = $this->container->get('serializer');
                $result = $serializer->serialize($file, 'json', SerializationContext::create()->setGroups(array('basic')));
                $response = new Response($result);
                $response->headers->set('Content-Type', 'application/json');
                return $response;
            }
        }
    }

    /**
     * @Route("/api/uploadMultipart", name="api-upload-file-multipart")
     */
    public function uploadMultipartAction(Request $request) {
        if (!$this->getUser()) {
            return $this->timeoutAction();
        }
        $content = $request->getContent();
        $inputs = json_decode($content, true);
        $filename = $inputs['part'] . "_" . $inputs['parts'] . "_" . $inputs['name'];
        $myfile = fopen("/www/iskun.net/web/tmp/" . $filename, "w") or die("Unable to open file!");
        fwrite($myfile, $inputs['data']);
        fclose($myfile);

        $isdone = true;
        $done = 0;
        for ($i = 0; $i < $inputs['parts']; $i++) {
            if (!file_exists("/www/iskun.net/web/tmp/" . $i . "_" . $inputs['parts'] . "_" . $inputs['name'])) {
                $isdone = false;
            } else {
                $done++;
            }
        }
        // upload hoàn thành
        if ($isdone) {
            $em = $this->getDoctrine()->getEntityManager();
            $config = $em->getRepository("DataBundle:Configurations")->find(1);
            $name = md5($filename . time());
            $extensions = explode('.', $inputs['name']);
            $extension = $extensions[(count($extensions) - 1)];
            $filename = $name . '.' . $extension;

            $myfile = fopen("/www/iskun.net/web/files/" . $config->getCurrentFolder() . "/" . $filename, "w") or die("Unable to open file!");
            $stringfile = "";
            for ($i = 0; $i < $inputs['parts']; $i++) {
                $part = file_get_contents("/www/iskun.net/web/tmp/" . $i . "_" . $inputs['parts'] . "_" . $inputs['name'], true);
                $stringfile.=$part;
                unlink("/www/iskun.net/web/tmp/" . $i . "_" . $inputs['parts'] . "_" . $inputs['name']);
            }
            $stringfiles = explode(',', $stringfile);
            fwrite($myfile, base64_decode($stringfiles[1]));
            fclose($myfile);
            $file = new \DataBundle\Entity\Files();
            $file->setFilename($inputs['name']);
            $file->setFilepath("/files/" . $config->getCurrentFolder() . "/" . $filename);
            $file->setFormat($inputs['type']);
            $file->setThumbnail("");
            $file->setExtension($extension);
            $file->setUsers($this->getUser());
            $file->setSize($inputs['size']);
            $file->setTime(time());
            $file->setCommentsnumbers(0);
            $file->setLikesnumbers(0);
            $em->persist($file);
            $em->flush();
            $this->generatePreviewsAction($file->getId());
            //$file->setThumbnail($this->createFileThumbnailAction($file->getId()));
            $em->persist($file);
            $em->flush();
            $serializer = $this->container->get('serializer');
            $result = $serializer->serialize($file, 'json', SerializationContext::create()->setGroups(array('basic')));
            $response = new Response($result);
            $response->headers->set('Content-Type', 'application/json');
            return $response;
        }
        $result['percent'] = ceil(($done / $inputs['parts']) * 100);
        $result['name'] = $inputs['name'];
        $response = new Response(json_encode($result));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
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

    /**
     * @Route("/api/generatePreview/{id}", name="generate-preview")  
     */
    public function generatePreviewsAction($id) {
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
            $imagick2 = new \Imagick("/www/iskun.net/web" . $file->getFilepath());
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

    /**
     * @Route("/convertedFile/{id}/{filename}", name="converted-file")  
     */
    public function convertedFileAction($id, $filename) {
        ini_set('max_execution_time', 3000);
        $em = $this->getDoctrine()->getEntityManager();
        $config = $em->getRepository("DataBundle:Configurations")->find(1);
        $file = $em->getRepository("DataBundle:Files")->find($id);
        foreach ($file->getPreviews() as $preview) {
            $em->remove($preview);
            $em->flush();
            if (file_exists("/www/iskun.net/web/previews/" . $preview->getFilepath())) {
                unlink("/www/iskun.net/web/previews/" . $preview->getFilepath());
            }
        }
        $myfile = fopen("/www/iskun.net/web/previews/" . $config->getCurrentFolder() . "/" . $filename, "w") or die("Unable to open file!");
        fwrite($myfile, file_get_contents("http://" . $config->getConverterip() . "/converter/" . $filename));
        fclose($myfile);
        $this->pdfToPreviewsAction("/www/iskun.net/web/previews/" . $config->getCurrentFolder() . "/" . $filename, $id);
        if (file_exists("/www/iskun.net/web/previews/" . $config->getCurrentFolder() . "/" . $filename)) {
            unlink("/www/iskun.net/web/previews/" . $config->getCurrentFolder() . "/" . $filename);
        }
        $result['success'] = 1;
        $response = new Response(json_encode($result));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    /**
     * @Route("/pdfToPreviews/{pdf}/{id}", name="pdfToPreviews")  
     */
    public function pdfToPreviewsAction($pdf, $id) {
        $em = $this->getDoctrine()->getEntityManager();
        $config = $em->getRepository("DataBundle:Configurations")->find(1);
        $file = $em->getRepository("DataBundle:Files")->find($id);
        if (!file_exists("/www/iskun.net/web/previews/" . $config->getCurrentFolder() . "/" . $file->getId())) {
            mkdir("/www/iskun.net/web/previews/" . $config->getCurrentFolder() . "/" . $file->getId(), 0777);
        }
        $command = "convert  -density 300 $pdf -quality 75 -alpha off -resize 30%  /www/iskun.net/web/previews/" . $config->getCurrentFolder() . "/" . $file->getId() . "/" . $file->getFilename() . "_%04d.jpg";
        shell_exec($command);
        $cdir = scandir("/www/iskun.net/web/previews/" . $config->getCurrentFolder() . "/" . $file->getId());
        $count = 0;
        foreach ($cdir as $key => $value) {
            if (!in_array($value, array(".", ".."))) {
                $count++;
                rename("/www/iskun.net/web/previews/" . $config->getCurrentFolder() . "/" . $file->getId() . "/" . $value, "/www/iskun.net/web/previews/" . $config->getCurrentFolder() . "/" . $value);
                $preview = new \DataBundle\Entity\Previews();
                $preview->setFilepath($config->getCurrentFolder() . "/" . $value);
                $preview->setFiles($file);
                $em->persist($preview);
                $em->flush();
                $file->setIsPreviewed(1);
            }
        }
        $file->setPages($count);
        $file->setThumbnail($this->createFileThumbnailAction($file->getId()));
        $em->persist($file);
        $em->flush();
        exec("rm -fr /www/iskun.net/web/previews/" . $config->getCurrentFolder() . "/" . $file->getId());
        $result['success'] = 1;
        $response = new Response(json_encode($result));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    /**
     * @Route("/convertPage/{id}/{filename}/{page}/{totalpages}", name="convertPage")  
     */
    public function convertPageAction($id, $filename, $page, $totalpages) {
        $em = $this->getDoctrine()->getEntityManager();
        $config = $em->getRepository("DataBundle:Configurations")->find(1);
        $file = $em->getRepository("DataBundle:Files")->find($id);
        $previews = $em->getRepository("DataBundle:Previews")->findBy(array("files" => $id, "page" => ($page + 1)));
        foreach ($previews as $pre) {
            $em->remove($pre);
            $em->flush();
            if (file_exists("/www/iskun.net/web/previews/" . $pre->getFilepath())) {
                unlink("/www/iskun.net/web/previews/" . $pre->getFilepath());
            }
        }
        $myfile = fopen("/www/iskun.net/web/previews/" . $config->getCurrentFolder() . "/" . $filename . "_" . $page . ".jpg", "w") or die("Unable to open file!");
        fwrite($myfile, file_get_contents("http://" . $config->getConverterip() . "/converter/" . $id . "/" . $filename . "_" . $page . ".jpg"));
        fclose($myfile);

        $preview = new \DataBundle\Entity\Previews();
        $preview->setFilepath($config->getCurrentFolder() . "/" . $filename . "_" . $page . ".jpg");
        $preview->setFiles($file);
        $preview->setPage($page + 1);
        $em->persist($preview);
        $em->flush();
        $file->setIsPreviewed(1);
        if ($page == 0) {
            $file->setPages($totalpages);
            $file->setThumbnail($this->createFileThumbnailAction($file->getId()));
            $em->persist($file);
            $em->flush();
        }
        $result['success'] = 1;
        $response = new Response(json_encode($result));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    /**
     * @Route("/convertedPreviews/{id}/{pages}/{filename}", name="converted-previews")  
     */
    public function convertedPreviewsAction($id, $pages, $filename) {
        $em = $this->getDoctrine()->getEntityManager();
        $config = $em->getRepository("DataBundle:Configurations")->find(1);
        $file = $em->getRepository("DataBundle:Files")->find($id);
        foreach ($file->getPreviews() as $preview) {
            $em->remove($preview);
            $em->flush();
            if (file_exists("/www/iskun.net/web/previews/" . $preview->getFilepath())) {
                unlink("/www/iskun.net/web/previews/" . $preview->getFilepath());
            }
        }
        for ($i = 0; $i < $pages; $i++) {
            $myfile = fopen("/www/iskun.net/web/previews/" . $config->getCurrentFolder() . "/" . $filename . "_" . $i . ".jpg", "w") or die("Unable to open file!");
            fwrite($myfile, file_get_contents("http://" . $config->getConverterip() . "/converter/" . $id . "/" . $filename . "_" . $i . ".jpg"));
            fclose($myfile);
            $preview = new \DataBundle\Entity\Previews();
            $preview->setFilepath($config->getCurrentFolder() . "/" . $filename . "_" . $i . ".jpg");
            $preview->setFiles($file);
            $em->persist($preview);
            $em->flush();
            $file->setIsPreviewed(1);
        }

        $file->setPages($pages);
        $file->setThumbnail($this->createFileThumbnailAction($file->getId()));
        $em->persist($file);
        $em->flush();
        $result['success'] = 1;
        $response = new Response(json_encode($result));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    public function createFileThumbnailAction($id) {
        $em = $this->getDoctrine()->getEntityManager();
        $file = $em->getRepository("DataBundle:Files")->find($id);
        $config = $em->getRepository("DataBundle:Configurations")->find(1);
        if (in_array($file->getFormat(), array("image/jpeg", "image/png"))) {
            $imagick = new \Imagick("/www/iskun.net/web/files/" . $file->getFilepath());
            $imagick->setImageFormat('jpg');
            $imagick->setbackgroundcolor('rgb(64, 64, 64)');
            $imagick->cropThumbnailImage(300, 300);
            $imagick->setImageCompression(\Imagick::COMPRESSION_JPEG);
            $imagick->setImageCompressionQuality(75);
            $imagick->stripImage();
            $name = md5(rand(100, 200)) . ".jpg";
            $imagick->writeImage('/www/iskun.net/web/thumbnails/' . $config->getCurrentFolder() . '/' . $name);
            $imagick->destroy();
            return $config->getCurrentFolder() . "/" . $name;
        } else {


            $preview = $em->getRepository("DataBundle:Previews")->findOneBy(array("files" => $file->getId(), "page" => 1));
            if ($preview) {
                $imagick = new \Imagick("/www/iskun.net/web/previews/" . $preview->getFilepath());
                $imagick->setImageFormat('jpg');
                $imagick->setbackgroundcolor('rgb(64, 64, 64)');
                $imagick->cropThumbnailImage(300, 300);
                $imagick->setImageCompression(\Imagick::COMPRESSION_JPEG);
                $imagick->setImageCompressionQuality(75);
                $imagick->stripImage();
                $name = md5(rand(100, 200)) . ".jpg";
                $imagick->writeImage('/www/iskun.net/web/thumbnails/' . $config->getCurrentFolder() . '/' . $name);
                $imagick->destroy();

                return $config->getCurrentFolder() . "/" . $name;
            }
        }
        return "";
    }

    /**
     * @Route("/api/deleteResource/{id}", name="delete-resource")  
     */
    public function deleteResourceAction($id) {
        $em = $this->getDoctrine()->getEntityManager();
        $post = $em->getRepository("DataBundle:Posts")->find($id);
        foreach ($post->getPostsFiles() as $postfile) {
            if ($postfile->getFiles()->getThumbnail() != "") {
                if (file_exists("/www/iskun.net/web/thumbnails/" . $postfile->getFiles()->getThumbnail())) {
                    unlink("/www/iskun.net/web/thumbnails/" . $postfile->getFiles()->getThumbnail());
                }
            }
            if ($postfile->getFiles()->getFilepath() != "") {
                if (file_exists("/www/iskun.net/web/files/" . $postfile->getFiles()->getFilepath())) {
                    unlink("/www/iskun.net/web/files/" . $postfile->getFiles()->getFilepath());
                }
            }
            foreach ($postfile->getFiles()->getPreviews() as $preview) {
                if (file_exists("/www/iskun.net/web/previews/" . $preview->getFilepath())) {
                    unlink("/www/iskun.net/web/previews/" . $preview->getFilepath());
                }
            }
        }
        $em->remove($post);
        $em->flush();
        $result['success'] = 1;
        $response = new Response(json_encode($result));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }



    /**
     * @Route("/api/getEmails/{token}", name="api-emails")
     */
    public function getEmailsAction($token) {
        $em = $this->getDoctrine()->getEntityManager();
        $user = $em->getRepository("DataBundle:Users")->findOneByToken($token);
        $dql = "SELECT e FROM DataBundle:Emails e JOIN e.to_users to WHERE to.id=" . $user->getId() . " ORDER BY e.id DESC";
        $query = $em->createQuery($dql)
                ->setFirstResult(0)
                ->setMaxResults(50);
        $emails = $query->getResult();
        $serializer = $this->container->get('serializer');
        $result = $serializer->serialize($emails, 'json', SerializationContext::create()->setGroups(array('basic')));
        $response = new Response($result);
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    /**
     * @Route("/api/sendReply/{token}", name="api-emails-reply")
     */
    public function sendReplyAction($token, Request $request) {
        $em = $this->getDoctrine()->getEntityManager();
        $content = $request->getContent();
        $reply = json_decode($content, true);
        $user = $em->getRepository("DataBundle:Users")->findOneByToken($token);
        $email = new \DataBundle\Entity\Emails();
        $email->setFromEmailsaddresses($em->getRepository("DataBundle:EmailsAddresses")->find($reply['to_emailsaddresses']['id']));
        $email->setContent($reply['reply']['content']);
        $email->setFromUsers($user);
        $email->setFromAddress($reply['to_address']);
        $email->setSentTime(time());
        $email->setReplyTo($em->getRepository("DataBundle:Emails")->find($reply['id']));
        // nếu cùng hệ thống không sử dụng postfix
        $email->setToAddress($reply['from_address']);
        $em->persist($email);
        $em->flush();

        $headers = "From: " . $reply['to_address'] . "\r\n";
        $headers .= "Delivered-To: " . $reply['from_address'] . "\r\n";
        $headers .= "In-Reply-To: " . $reply['message_id'] . "\r\n";
        $headers .= "References: " . $reply['message_id'] . "\r\n";
        $headers .= "Return-Path: " . $reply['to_address'] . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "id: " . $email->getId() . "\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        $headers .= "Bcc: returnmessageid@iskun.net \r\n";
        mail($reply['from_address'], "[Trả lời] - " . $reply['subject'], $reply['reply']['content'], $headers);
        $serializer = $this->container->get('serializer');
        $result = $serializer->serialize($email, 'json', SerializationContext::create()->setGroups(array('basic')));
        $response = new Response($result);
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    /**
     * @Route("/api/getSchoolsTypes", name="api-get-schools-types")
     */
    public function getSchoolsTypesAction() {
        $em = $this->getDoctrine()->getEntityManager();
        $formats = $em->getRepository("DataBundle:SchoolsTypes")->findBy(array("parent" => null));
        $serializer = $this->container->get('serializer');
        $formats = $serializer->serialize($formats, 'json', SerializationContext::create()->setGroups(array('basic')));
        $response = new Response($formats);
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    /**
     * @Route("/api/getMySchools/{token}", name="api-get-my-schools")
     */
    public function getMySchoolsAction($token) {
        $em = $this->getDoctrine()->getEntityManager();
        $user = $em->getRepository("DataBundle:Users")->findOneByToken($token);
        $schools = $em->getRepository("DataBundle:Schools")->findBy(array("schoolscreater" => $user->getId()));
        $serializer = $this->container->get('serializer');
        $result = $serializer->serialize($schools, 'json', SerializationContext::create()->setGroups(array('basic')));
        $response = new Response($result);
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    /**
     * @Route("/api/postSchool/{token}", name="api-post-new-school")
     */
    public function postSchoolTypesAction($token, Request $request) {
        $em = $this->getDoctrine()->getEntityManager();
        $content = $request->getContent();
        $inputs = json_decode($content, true);
        if (!isset($inputs['name']))
        {
            $errors['name']="Vui lòng nhập tên nhà trường";
        }
        else
        {
            if (strlen($inputs['name'])<=0)
            {
                $errors['name']="Vui lòng nhập tên nhà trường";
            }
        }
        if (!isset($inputs['schoolstypes']))
        {
            $errors['schoolstypes']="Chọn loại hình nhà trường";
        }
        if (!isset($errors))
        {
        $user = $em->getRepository("DataBundle:Users")->findOneByToken($token);
        $school = new \DataBundle\Entity\Schools();
        $school->setName($inputs['name']);
        $school->setCreateTime(time());
        $school->setSchoolscreater($user);
        $school->setSchoolstypes($em->getRepository("DataBundle:SchoolsTypes")->find($inputs['schoolstypes']['id']));
        $em->persist($school);
        $em->flush();
        $slug = $this->newSlug($inputs['name'], "schools");
        $school->setSlugs($slug);
        $em->persist($school);
        $em->flush();
        $serializer = $this->container->get('serializer');
        $result = $serializer->serialize($school, 'json', SerializationContext::create()->setGroups(array('basic')));
        }
        else{
            $result=  json_encode(array("errors"=>$errors));
        }
        
        $response = new Response($result);
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
    
    /**
     * @Route("/api/getMyCreatedSchools/{token}", name="api-post-school")
     */
    public function getMyCreatedSchoolsAction($token, Request $request) {
        $em = $this->getDoctrine()->getEntityManager();
        $content = $request->getContent();
        $inputs = json_decode($content, true);
        $user = $em->getRepository("DataBundle:Users")->findOneByToken($token); 
        $schools = $em->getRepository("DataBundle:Schools")->findBy(array("schoolscreater"=>$user->getId()));
        $serializer = $this->container->get('serializer');
        $formats = $serializer->serialize($schools, 'json', SerializationContext::create()->setGroups(array('basic')));
        $response = new Response($formats);
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
    
    /**
     * @Route("/api/getSchool/{token}/{id}", name="api-get-school")
     */
    public function getSchoolAction($token, Request $request,$id) {
        $em = $this->getDoctrine()->getEntityManager();
        $content = $request->getContent();
        $inputs = json_decode($content, true);
        $user = $em->getRepository("DataBundle:Users")->findOneByToken($token); 
        $schools = $em->getRepository("DataBundle:Schools")->find($id);
        $serializer = $this->container->get('serializer');
        $formats = $serializer->serialize($schools, 'json', SerializationContext::create()->setGroups(array('basic')));
        $response = new Response($formats);
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    public function newSlug($slug, $entity) {
        $em = $this->getDoctrine()->getEntityManager();
        $slug = $this->toSlug($slug);
        $exist = $em->getRepository("DataBundle:Slugs")->findOneBy(array("slug" => $slug));
        if ($exist) {
            for ($i = 1; $i <= 1000; $i++) {
                $newSlug = $slug . "-" . $i;
                $exist = $em->getRepository("DataBundle:Slugs")->findOneBy(array("slug" => $newSlug));
                if (!$exist) {
                    $slug = $newSlug;
                    break;
                }
            }
        }
        $slugs = new Slugs();
        $slugs->setSlug(strtolower($slug));
        $slugs->setEntity("schools");
        $em->persist($slugs);
        $em->flush();
        return $slugs;
    }

    public function toSlug($str) {
        $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
        $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
        $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
        $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
        $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
        $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
        $str = preg_replace("/(đ)/", 'd', $str);
        $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
        $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
        $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
        $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
        $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
        $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
        $str = preg_replace("/(Đ)/", 'D', $str);
        $str = preg_replace("/( )/", '', $str);

        return $str; // Trả về chuỗi đã chuyển
    }

}

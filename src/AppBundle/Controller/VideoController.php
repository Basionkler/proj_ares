<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Video;
use AppBundle\Repositories\VideoRepository;
use Doctrine\ORM\EntityRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * Controller used to manage Videos
 * @Route("/user")
 */
class VideoController extends Controller {
	/**
	* Basic function to get videos from database. Needs to be improved.
    * @Route("/showvideo", name="videos")
    * @Method({"GET"})
    */
    public function getVideos($request) {
    	$entityManager = $this->getDoctrine()->getManager();
    	$videos = $entityManager->getRepository('AppBundle:Video')->getAllVideo();
    	return $this->render('default/index.html.twig'); //Needs improvements
    }
}
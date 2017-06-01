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
 * @Route("/video")
 */
class VideoController extends Controller {
	/**
	* Basic function to get videos from database. Needs to be improved.
    * @Route("/", name="videos")
    * @Method({"GET"})
    */
    public function getVideos() {
    	$entityManager = $this->getDoctrine()->getManager();
    	$videos = $entityManager->getRepository('AppBundle:Video')->findAll();
    	return $this->render('default/index.html.twig', array('videos' => $videos)); //Needs improvements
    }

    /**
    * Get video from thumbnail
    * @Route("/{id}", name="videoById")
    * @Method({"GET"})
    */
    public function getVideo($id) {
    	$entityManager = $this->getDoctrine()->getManager();
    	$video = $entityManager->getRepository('AppBundle:Video')->getVidById($id);
    	return $this->render('vids/videos.html.twig', ['video' => $video]); //Needs improvements
    }
}
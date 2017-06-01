<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Video;
use AppBundle\Entity\Comment;
use AppBundle\Repositories\VideoRepository;
use Doctrine\ORM\EntityRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\TextType;
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
    * @Route("/{id}", name="videoById", requirements={"id":"\d+"})
    * @Method({"GET"})
    */
    public function getVideo(Request $request, $id) {
    	$entityManager = $this->getDoctrine()->getManager();
    	$video = $entityManager->getRepository('AppBundle:Video')->getVidById($id);
    	return $this->render('vids/videos.html.twig', ['video' => $video]); //Needs improvements
    }

    /*
 	 * Check if session is valid. If so, user can comment. SECURITY SYSTEM NEEDS TO BE DEVELOPED!!!
     * @Route("/", name="comment")
     * @Method({"GET", "POST"})
	 */
	public function commentVideoAction(Request $request) {

		$comment = new Comment();

   		$form = $this->createFormBuilder($comment)
        	->add('text', TextType::class)
        	->add('Invia Commento', SubmitType::class)
        	->getForm();

    	$form->handleRequest($request);

    	if($form->isSubmitted() && $form->isValid()) {
	        $comment = $form->getData();
	        $entityManager = $this->getDoctrine()->getManager();
	        $entityManager->persist($comment);
	        $entityManager->flush();
	        return $this->render('vids/videos.html.twig');
	    }
        return $this->render('vids/videos.html.twig', array(
        'form' => $form->createView(),
    	));
	}
}
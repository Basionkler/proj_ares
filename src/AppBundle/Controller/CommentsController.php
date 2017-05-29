<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Entity\Comment;
use AppBundle\Repositories\UserRepository;
use Doctrine\ORM\EntityRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

    /**
     * @Route("/", name="comment")
     * @Method({"GET", "POST"})
     *
     */
class CommentsController extends Controller {

	/* @Author Federico
 	* @Param request
 	* Check if session is valid. If so, user can comment
	 */
	public function commentVideo(Request $request) {
		$securityContext = $this->container->get('security.authorization_checker');
		if ($securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) { // authenticated REMEMBERED
			$comment = new Comment();
			$form = $this->createForm(CommentType::class, $comment)->add('commentVideo',SubmitType::class);
       		$form->handleRequest($request);

       		/* How to add the video id? */
       		if($form->isSubmitted() && $form->isValid()) {
       			$comment->$user = $this->getUser();
           		$entityManager = $this->getDoctrine()->getManager();
            	$entityManager->persist($comment);
            	$entityManager->flush();
            	return $this->render('default/index.html.twig');
       		}
		}
		return $errorComment; //TO DO
	}
}

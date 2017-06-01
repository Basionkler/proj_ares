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
     * @Route("/")
     *
     */
class CommentsController extends Controller {
/*
	/*
 	 * Check if session is valid. If so, user can comment. SECURITY SYSTEM NEEDS TO BE DEVELOPED!!!
   * @Route("/", name="comment")
   * @Method({"GET", "POST"})
	 
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
*/
}

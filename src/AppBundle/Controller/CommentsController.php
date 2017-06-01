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


class CommentsController extends Controller {
   /*
    * Check if session is valid. If so, user can comment. SECURITY SYSTEM NEEDS TO BE DEVELOPED!!!
    * @Route(name="comment")
    * @Method({"GET", "POST"})
    */
  public function commentVideoAction(Request $request, $video) {

      $comment = new Comment();

      $form = $this->createFormBuilder($comment)
          ->add('text', TextType::class, Array('label' => 'Commenta'))
          ->add('Invia Commento', SubmitType::class)
          ->getForm();

      $form->handleRequest($request);

      if(true) {
          $comment = $form->getData();
          $comment->setUser($this->get('session')->get('user'));
          $comment->setVideo($video);
          $entityManager = $this->getDoctrine()->getManager();
          $entityManager->persist($comment);
          $entityManager->flush();
          return $this->render('comments/comment.html.twig');
      }
      return $this->render('comments/comment.html.twig', array(
        'form' => $form->createView(),
      ));
  }
}

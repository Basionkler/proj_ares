<?php

namespace AppBundle\Controller;


use AppBundle\Entity\User;
use AppBundle\Form\Types\UserType;
use AppBundle\Helpers\SignUpHelper;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

/**
 * Controller used to manage User login, logout and sign up on the website
 *
 * @Route("/user")
 *
 * @author
 */
class UserAccessController extends Controller
{
    /**
     * @Route("/signup", name="user_signup")
     * @Method({"GET", "POST"})
     *
     */
    public function userSignUpAction(Request $request) {
        $user = new User();
        $form = $this->createForm(UserType::class, $user)->add('createNewUser',SubmitType::class);
        $form->handleRequest($request);
        $userSignUpHelper = new SignUpHelper();
        if($form->isSubmitted() && $form->isValid() && $userSignUpHelper->isValid($user)) {
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($user);
                $entityManager->flush();
            if($form->get('createNewUser')->isClicked()) {
                return $this->redirectToRoute('user_login');
            }
            return $this->render('default/index.html.twig');
        }
        else {
            $form = $userSignUpHelper->setErrorMessages($form,$user);
        }
        return $this->render('website/signup.html.twig', ['post' => $user, 'form' => $form->createView(), ]);
    }

}
<?php

namespace AppBundle\Controller;


use AppBundle\Entity\User;
use AppBundle\Form\Types\UserType;
use AppBundle\Helpers\SignUpHelper;
use AppBundle\Repositories\UserRepository;
use Doctrine\ORM\EntityRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

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
                return $this->redirectToRoute('user_signin');
            }
            return $this->render('default/index.html.twig');
        }
        else {
            $form = $userSignUpHelper->setErrorMessages($form,$user);
        }
        return $this->render('website/signup.html.twig', ['post' => $user, 'form' => $form->createView(), ]);
    }

    /**
     * @Route("/signin", name="user_signin")
     * @Method({"GET", "POST"})
     *
     */
    public function startUserSignInAction(Request $request) {
        if($request->get('nickname') && $request->get('password')) {
            $nickname = $request->get('nickname');
            $password = $request->get('password');
            $em = $this->getDoctrine()->getManager();
            $user = $em->getRepository('AppBundle:User')->findByNickname($nickname);
            if($user->checkPassword($password)) {
                $session = $this->get('session');
                $session->set('id', $user->getId());
                $session->set('nickname', $user->getNickname());
                return $this->render('default/index.html.twig');
            }
        }
        else {
            $error = null;
            return $this->render('website/signin.html.twig', ['error' => $error, 'last_username' => null,]);
        }
    }
}
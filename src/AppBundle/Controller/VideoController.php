<?php

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Video;
use AppBundle\Form\Types\VideoType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


/**
 * Class VideoController
 *
 * @Route("/video")
 */
class VideoController extends Controller
{
    /**
     * @Route("/load", name="load_video")
     * @Method({"GET","POST"})
     */
    public function loadVideoAction(Request $request) {
        $video = new Video();
        $form = $this->createForm(VideoType::class, $video, array(
            "allow_extra_fields" => array(
            "languages" => $this->getDoctrine()->getManager()->getRepository('AppBundle:Language')->findAll()
            )
        ))->add('loadNewVideo',SubmitType::class);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            /*$entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            if($form->get('createNewUser')->isClicked()) {
                return $this->redirectToRoute('user_signin');
            }
            return $this->render('default/index.html.twig');*/
        }
        else {
            //$form = $userSignUpHelper->setErrorMessages($form,$user);
        }
        return $this->render('website/load_video.html.twig', ['post' => $video, 'form' => $form->createView(), ]);
    }


}
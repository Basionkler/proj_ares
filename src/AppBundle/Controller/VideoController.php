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
                "languages" => $this->getDoctrine()->getManager()->getRepository('AppBundle:Language')->findAll(),
                "categories" => $this->getDoctrine()->getManager()->getRepository('AppBundle:Category')->findAll()
            )
        ))->add('loadNewVideo',SubmitType::class);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {

            //Da modificare
            $video->setLink("http://www.google.com");
            $date = new \DateTime('now');
            $video->setUploadingDate($date);
            $video->setPrivacy("TUTTILOGUARDANO");

            $video->getThumbnail()->move("thumbnails/");

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($video);
            $entityManager->flush();
            if($form->get('loadNewVideo')->isClicked()) {
                return $this->redirectToRoute('homepage');
            }
            return $this->render('default/index.html.twig');
        }
        else {
            //$form = $userSignUpHelper->setErrorMessages($form,$user);
        }
        return $this->render('website/load_video.html.twig', ['post' => $video, 'form' => $form->createView(), ]);
    }

    /**
     * @Route("/delete", name="delete_video")
     * @Method({"GET","POST"})
     */
    public function deleteVideoAction(Request $request) {
        //$form = $this->createForm(VideoType::class)

    }


}
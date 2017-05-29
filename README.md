proj_ares
========

@Author Federico:
Changelog 29/05/2017 -
--------
• Fixed some inconsinstance errors. See below for details:
*AppBundle\Entity\VideoEvaluation* 	

   1. The association AppBundle\Entity\VideoEvaluation#video refers to the inverse side field AppBundle\Entity\Video#video_evaluation which does not exist.

*AppBundle\Entity\Video *

  1.  The mappings AppBundle\Entity\Video#evaluations and AppBundle\Entity\VideoEvaluation#video are inconsistent with each other.
  2.  The association AppBundle\Entity\Video#language refers to the inverse side field AppBundle\Entity\Language#video which does not exist.
  3.  The association AppBundle\Entity\Video#category refers to the inverse side field AppBundle\Entity\Category#video which does not exist.
  4.  The association AppBundle\Entity\Video#playlists refers to the inverse side field AppBundle\Entity\Playlist#video which does not exist.
  5.  The mappings AppBundle\Entity\Video#comments and AppBundle\Entity\Comment#video are inconsistent with each other.

* AppBundle\Entity\Playlist *	

   1. The association AppBundle\Entity\Playlist#videos refers to the owning side field AppBundle\Entity\Video#playlist which does not exist.

* AppBundle\Entity\Comment 	*

   1. The association AppBundle\Entity\Comment#video refers to the inverse side field AppBundle\Entity\Video#comment which does not exist.
   2. The mappings AppBundle\Entity\Comment#answers and AppBundle\Entity\Answer#comment are inconsistent with each other.



=========

Daniele 22.29 Changelog

Aggiunto: Pagina di login e login

Da fare: 
- Aggiungere messaggi di errore per login sbagliata
- Riorganizzare il codice di login e registrazione in " AppBundle > Controller > UserAccessController "

A Symfony project created on May 22, 2017, 5:11 pm.

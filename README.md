proj_ares
========
Changelog 31/05/2017 - 
--------
• New folder created:
	- *thumbnails* : Temporanea. Insert here thumbnails for videos.

• Temporary commented from line 339 to 358 in Entity 'User.php' (Entity CommentsLiked does NOT exist).

@Author Federico:
Changelog 29/05/2017 -
--------
• New folder created:
	- *videos*: This folder will contain videos which are supposed to be loaded to the server

• New files created:
	- *CommentsController.php*: Located in ..\src\AppBundle\Controller. This should contain all functions reguarding commenting videos, replies and comments evalutaions (Should be better to create a EvaluationController to control both Likes on comments and likes on videos?). Some errors for sure. We need to review that.
	- *CommentType.php*: Located in ..\src\AppBundle\Form\Type. We need to review this.
	- *VideoRepository.php*: Located in ..\src\AppBundle\Repositories. Add queries for videos.
	- *VideoController.php*: Same as previous.

• Fixed some inconsinstance errors. See below for details:

*AppBundle\Entity\VideoEvaluation* 	

   1. The association AppBundle\Entity\VideoEvaluation#video refers to the inverse side field AppBundle\Entity\Video#video_evaluation which does not exist.

*AppBundle\Entity\Video*

  1.  The mappings AppBundle\Entity\Video#evaluations and AppBundle\Entity\VideoEvaluation#video are inconsistent with each other.
  2.  The association AppBundle\Entity\Video#language refers to the inverse side field AppBundle\Entity\Language#video which does not exist.
  3.  The association AppBundle\Entity\Video#category refers to the inverse side field AppBundle\Entity\Category#video which does not exist.
  4.  The association AppBundle\Entity\Video#playlists refers to the inverse side field AppBundle\Entity\Playlist#video which does not exist.
  5.  The mappings AppBundle\Entity\Video#comments and AppBundle\Entity\Comment#video are inconsistent with each other.

*AppBundle\Entity\Playlist*	

   1. The association AppBundle\Entity\Playlist#videos refers to the owning side field AppBundle\Entity\Video#playlist which does not exist.

*AppBundle\Entity\Comment*

   1. The association AppBundle\Entity\Comment#video refers to the inverse side field AppBundle\Entity\Video#comment which does not exist.
   2. The mappings AppBundle\Entity\Comment#answers and AppBundle\Entity\Answer#comment are inconsistent with each other.

=========

Daniele 22.29 Changelog

Aggiunto: Pagina di login e login

Da fare: 
- Aggiungere messaggi di errore per login sbagliata
- Riorganizzare il codice di login e registrazione in " AppBundle > Controller > UserAccessController "

A Symfony project created on May 22, 2017, 5:11 pm.

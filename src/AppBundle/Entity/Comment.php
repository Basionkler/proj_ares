<?php

namespace AppBundle\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="comment")
 */
class Comment
{
    /**
     * @ORM\Column(name="comment_id", type="integer", length=10)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=1000)
     */
    private $text;

    /**
     * Many Comments have one User
     * @ORM\ManyToOne(targetEntity="User", inversedBy="commentsWritten")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="user_id")
     */
    private $user;

    /**
     * Many Comments have one Video
     * @ORM\ManyToOne(targetEntity="Video", inversedBy="comments")
     * @ORM\JoinColumn(name="video_id", referencedColumnName="video_id")
     */
    private $video;

    /**
     * Many Comments have many CommentLikes
     * @ORM\ManyToMany(targetEntity="User", mappedBy="commentsLiked")
     */
    private $commentLikes;

    /**
     * One Comment has many Answers
     * @ORM\OneToMany(targetEntity="Answer", mappedBy="comment")
     */
    private $answers;


    public function __construct() {
        $this->answers = new ArrayCollection();
    }

    /**
     * Get idComment
     *
     * @return integer
     */
    public function getIdComment()
    {
        return $this->id;
    }

    /**
     * Set text
     *
     * @param string $text
     *
     * @return Comment
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\Unit $user
     *
     * @return Comment
     */
    public function setUser(\AppBundle\Entity\Unit $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\Unit
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set video
     *
     * @param \AppBundle\Entity\Video $video
     *
     * @return Comment
     */
    public function setVideo(\AppBundle\Entity\Video $video = null)
    {
        $this->video = $video;

        return $this;
    }

    /**
     * Get video
     *
     * @return \AppBundle\Entity\Video
     */
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * Add commentLike
     *
     * @param \AppBundle\Entity\CommentLike $commentLike
     *
     * @return Comment
     */
    public function addCommentLike(\AppBundle\Entity\CommentLike $commentLike)
    {
        $this->commentLikes[] = $commentLike;

        return $this;
    }

    /**
     * Remove commentLike
     *
     * @param \AppBundle\Entity\CommentLike $commentLike
     */
    public function removeCommentLike(\AppBundle\Entity\CommentLike $commentLike)
    {
        $this->commentLikes->removeElement($commentLike);
    }

    /**
     * Get commentLikes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCommentLikes()
    {
        return $this->commentLikes;
    }

    /**
     * Add answer
     *
     * @param \AppBundle\Entity\Comment $answer
     *
     * @return Comment
     */
    public function addAnswer(\AppBundle\Entity\Comment $answer)
    {
        $this->answers[] = $answer;

        return $this;
    }

    /**
     * Remove answer
     *
     * @param \AppBundle\Entity\Comment $answer
     */
    public function removeAnswer(\AppBundle\Entity\Comment $answer)
    {
        $this->answers->removeElement($answer);
    }

    /**
     * Get answers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAnswers()
    {
        return $this->answers;
    }

    /**
     * Set comment
     *
     * @param \AppBundle\Entity\Comment $comment
     *
     * @return Comment
     */
    public function setComment(\AppBundle\Entity\Comment $comment = null)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return \AppBundle\Entity\Comment
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}

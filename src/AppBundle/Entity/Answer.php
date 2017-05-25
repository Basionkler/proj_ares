<?php

namespace AppBundle\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="answer")
 */
class Answer
{
    /**
     * @ORM\Column(name="answer_id", type="integer", length=10)
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
     * @ORM\ManyToOne(targetEntity="User", inversedBy="comment")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="user_id")
     */
    private $user;

    /**
     * Many Comments have one Video
     * @ORM\ManyToOne(targetEntity="Video", inversedBy="comment")
     * @ORM\JoinColumn(name="video_id", referencedColumnName="video_id")
     */
    private $video;

    /**
     * Many Comments have many CommentLikes
     * @ORM\ManyToMany(targetEntity="User", mappedBy="comment")
     */
    private $commentLikes;

    /**
     * Many Answer has one Comment
     * @ORM\ManyToOne(targetEntity="Comment", inversedBy="answer")
     * @ORM\JoinColumn(name="comment_id", referencedColumnName="comment_id")
     */
    private $comment;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->commentLikes = new ArrayCollection();
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

    /**
     * Set text
     *
     * @param string $text
     *
     * @return Answer
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
     * @param \AppBundle\Entity\User $user
     *
     * @return Answer
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
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
     * @return Answer
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
     * @param \AppBundle\Entity\User $commentLike
     *
     * @return Answer
     */
    public function addCommentLike(\AppBundle\Entity\User $commentLike)
    {
        $this->commentLikes[] = $commentLike;

        return $this;
    }

    /**
     * Remove commentLike
     *
     * @param \AppBundle\Entity\User $commentLike
     */
    public function removeCommentLike(\AppBundle\Entity\User $commentLike)
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
     * Set comment
     *
     * @param \AppBundle\Entity\Comment $comment
     *
     * @return Answer
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
}

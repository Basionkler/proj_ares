<?php

namespace AppBundle\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="video_evaluation")
 */
class VideoEvaluation
{
    /**
     * @ORM\Column(name="video_evaluation_id", type="integer", length=10)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="decimal", scale=1)
     */
    private $evaluation;

    /**
     * Many VideoEvaluations have one User
     * @ORM\ManyToOne(targetEntity="User", inversedBy="evaluations")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="user_id")
     */
    private $user;

    /**
     * Many VideoEvaluations have one Video
     * @ORM\ManyToOne(targetEntity="Video", inversedBy="video_evaluation")
     * @ORM\JoinColumn(name="video_id", referencedColumnName="video_id")
     */
    private $video;


    /**
     * Get idVideoEvaluation
     *
     * @return integer
     */
    public function getIdVideoEvaluation()
    {
        return $this->id;
    }

    /**
     * Set evaluation
     *
     * @param string $evaluation
     *
     * @return VideoEvaluation
     */
    public function setEvaluation($evaluation)
    {
        $this->evaluation = $evaluation;

        return $this;
    }

    /**
     * Get evaluation
     *
     * @return string
     */
    public function getEvaluation()
    {
        return $this->evaluation;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return VideoEvaluation
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
     * @return VideoEvaluation
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}

<?php

namespace  AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User
{
    /**
     * @ORM\Column(name="user_id", type="integer", length=10)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=125, unique=true)
     */
    private $nickname;

    /**
     * @ORM\Column(type="string", length=75)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=75)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=125, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=125)
     */
    private $password;

    /**
     * One User has many VideoEvaluations
     * @ORM\OneToMany(targetEntity="VideoEvaluation", mappedBy="user")
     */
    private $evaluations;

    /**
     * One User has many Videos
     * @ORM\OneToMany(targetEntity="Video", mappedBy="user")
     */
    private $loadedVideos;

    /**
     * One User has many Playlists
     * @ORM\OneToMany(targetEntity="Playlist", mappedBy="creator")
     */
    private $playlists;

    /**
     * One User has many Comments
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="user")
     */
    private $commentsWritten;

    /**
     * Many Users have liked many Comments
     * @ORM\ManyToMany(targetEntity="Comment", inversedBy="commentLikes")
     * @ORM\JoinTable(name="comment_like",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="user_id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="comment_id", referencedColumnName="comment_id")}
     *      )
     */
    private $commentsLiked;

    public function __construct() {
        $this->evaluations = new ArrayCollection();
        $this->loadedVideos = new ArrayCollection();
        $this->playlists = new ArrayCollection();
        $this->commentsWritten = new ArrayCollection();
        $this->commentsLiked = new ArrayCollection();
    }

    /**
     * Get idUser
     *
     * @return integer
     */
    public function getIdUser()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Add evaluation
     *
     * @param \AppBundle\Entity\VideoEvaluation $evaluation
     *
     * @return User
     */
    public function addEvaluation(\AppBundle\Entity\VideoEvaluation $evaluation)
    {
        $this->evaluations[] = $evaluation;

        return $this;
    }

    /**
     * Remove evaluation
     *
     * @param \AppBundle\Entity\VideoEvaluation $evaluation
     */
    public function removeEvaluation(\AppBundle\Entity\VideoEvaluation $evaluation)
    {
        $this->evaluations->removeElement($evaluation);
    }

    /**
     * Get evaluations
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEvaluations()
    {
        return $this->evaluations;
    }

    /**
     * Add loadedVideo
     *
     * @param \AppBundle\Entity\Video $loadedVideo
     *
     * @return User
     */
    public function addLoadedVideo(\AppBundle\Entity\Video $loadedVideo)
    {
        $this->loadedVideos[] = $loadedVideo;

        return $this;
    }

    /**
     * Remove loadedVideo
     *
     * @param \AppBundle\Entity\Video $loadedVideo
     */
    public function removeLoadedVideo(\AppBundle\Entity\Video $loadedVideo)
    {
        $this->loadedVideos->removeElement($loadedVideo);
    }

    /**
     * Get loadedVideos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLoadedVideos()
    {
        return $this->loadedVideos;
    }

    /**
     * Add playlist
     *
     * @param \AppBundle\Entity\Playlist $playlist
     *
     * @return User
     */
    public function addPlaylist(\AppBundle\Entity\Playlist $playlist)
    {
        $this->playlists[] = $playlist;

        return $this;
    }

    /**
     * Remove playlist
     *
     * @param \AppBundle\Entity\Playlist $playlist
     */
    public function removePlaylist(\AppBundle\Entity\Playlist $playlist)
    {
        $this->playlists->removeElement($playlist);
    }

    /**
     * Get playlists
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPlaylists()
    {
        return $this->playlists;
    }

    /**
     * Add commentsWritten
     *
     * @param \AppBundle\Entity\Comment $commentsWritten
     *
     * @return User
     */
    public function addCommentsWritten(\AppBundle\Entity\Comment $commentsWritten)
    {
        $this->commentsWritten[] = $commentsWritten;

        return $this;
    }

    /**
     * Remove commentsWritten
     *
     * @param \AppBundle\Entity\Comment $commentsWritten
     */
    public function removeCommentsWritten(\AppBundle\Entity\Comment $commentsWritten)
    {
        $this->commentsWritten->removeElement($commentsWritten);
    }

    /**
     * Get commentsWritten
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCommentsWritten()
    {
        return $this->commentsWritten;
    }

    /**
     * Add commentsLiked
     *
     * @param \AppBundle\Entity\CommentLike $commentsLiked
     *
     * @return User
     */
    public function addCommentsLiked(\AppBundle\Entity\CommentLike $commentsLiked)
    {
        $this->commentsLiked[] = $commentsLiked;

        return $this;
    }

    /**
     * Remove commentsLiked
     *
     * @param \AppBundle\Entity\CommentLike $commentsLiked
     */
    public function removeCommentsLiked(\AppBundle\Entity\CommentLike $commentsLiked)
    {
        $this->commentsLiked->removeElement($commentsLiked);
    }

    /**
     * Get commentsLiked
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCommentsLiked()
    {
        return $this->commentsLiked;
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
     * Set nickname
     *
     * @param string $nickname
     *
     * @return User
     */
    public function setNickname($nickname)
    {
        $this->nickname = $nickname;

        return $this;
    }

    /**
     * Get nickname
     *
     * @return string
     */
    public function getNickname()
    {
        return $this->nickname;
    }
}

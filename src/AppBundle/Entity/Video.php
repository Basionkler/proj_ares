<?php

namespace AppBundle\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repositories\VideoRepository")
 * @ORM\Table(name="video")
 */
class Video
{
    /**
     * @ORM\Column(name="video_id", type="integer", length=10)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=125, unique=true)
     */
    private $link;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=2500)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=2500)
     */
    private $labels;

    /**
     * @ORM\Column(type="datetime")
     */
    private $uploadingDate;

    /**
     * @ORM\Column(type="datetime")
     */
    private $publishingDate;

    /**
     * @ORM\Column(type="integer")
     */
    private $isMain;

    /**
     * @ORM\Column(type="string", length=125)
     */
    private $thumbnail;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $privacy;

    /**
     * One Video has many Evaluations
     * @ORM\OneToMany(targetEntity="VideoEvaluation", mappedBy="video")
     */
    private $evaluations;

    /**
     * Many Videos have one category
     * @ORM\ManyToOne(targetEntity="User", inversedBy="loadedVideos")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="user_id")
     */
    private $user;

    /**
     * Many Videos have one Language
     * @ORM\ManyToOne(targetEntity="Language", inversedBy="videos")
     * @ORM\JoinColumn(name="language_id", referencedColumnName="language_id")
     */
    private $language;

    /**
     * Many Videos have one Category
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="videos")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="category_id")
     */
    private $category;

    /**
     * Many Videos have many Playlists
     * @ORM\ManyToMany(targetEntity="Playlist", inversedBy="videos")
     * @ORM\JoinTable(name="video_playlist",
     *      joinColumns={@ORM\JoinColumn(name="video_id", referencedColumnName="video_id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="playlist_id", referencedColumnName="playlist_id")}
     *      )
     */
    private $playlists;

    /**
     * One User has many comments
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="video")
     */
    private $comments;

    public function __construct() {
        $this->evaluations = new ArrayCollection();
        $this->playlists = new ArrayCollection();
        $this->comments = new ArrayCollection();
    }

    /**
     * Get idVideo
     *
     * @return integer
     */
    public function getIdVideo()
    {
        return $this->id;
    }

    /**
     * Set link
     *
     * @param string $link
     *
     * @return Video
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Video
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Video
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set labels
     *
     * @param string $labels
     *
     * @return Video
     */
    public function setLabels($labels)
    {
        $this->labels = $labels;

        return $this;
    }

    /**
     * Get labels
     *
     * @return string
     */
    public function getLabels()
    {
        return $this->labels;
    }

    /**
     * Set uploadingDate
     *
     * @param \DateTime $uploadingDate
     *
     * @return Video
     */
    public function setUploadingDate($uploadingDate)
    {
        $this->uploadingDate = $uploadingDate;

        return $this;
    }

    /**
     * Get uploadingDate
     *
     * @return \DateTime
     */
    public function getUploadingDate()
    {
        return $this->uploadingDate;
    }

    /**
     * Set publishingDate
     *
     * @param \DateTime $publishingDate
     *
     * @return Video
     */
    public function setPublishingDate($publishingDate)
    {
        $this->publishingDate = $publishingDate;

        return $this;
    }

    /**
     * Get publishingDate
     *
     * @return \DateTime
     */
    public function getPublishingDate()
    {
        return $this->publishingDate;
    }

    /**
     * Set isMain
     *
     * @param integer $isMain
     *
     * @return Video
     */
    public function setIsMain($isMain)
    {
        $this->isMain = $isMain;

        return $this;
    }

    /**
     * Get isMain
     *
     * @return integer
     */
    public function getIsMain()
    {
        return $this->isMain;
    }

    /**
     * Set thumbnail
     *
     * @param string $thumbnail
     *
     * @return Video
     */
    public function setThumbnail($thumbnail)
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }

    /**
     * Get thumbnail
     *
     * @return string
     */
    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    /**
     * Set privacy
     *
     * @param string $privacy
     *
     * @return Video
     */
    public function setPrivacy($privacy)
    {
        $this->privacy = $privacy;

        return $this;
    }

    /**
     * Get privacy
     *
     * @return string
     */
    public function getPrivacy()
    {
        return $this->privacy;
    }

    /**
     * Add evaluation
     *
     * @param \AppBundle\Entity\VideoEvaluation $evaluation
     *
     * @return Video
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
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Video
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
     * Set language
     *
     * @param \AppBundle\Entity\Language $language
     *
     * @return Video
     */
    public function setLanguage(\AppBundle\Entity\Language $language = null)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return \AppBundle\Entity\Language
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set category
     *
     * @param \AppBundle\Entity\Category $category
     *
     * @return Video
     */
    public function setCategory(\AppBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \AppBundle\Entity\Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Add playlist
     *
     * @param \AppBundle\Entity\Playlist $playlist
     *
     * @return Video
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
     * Add comment
     *
     * @param \AppBundle\Entity\Comment $comment
     *
     * @return Video
     */
    public function addComment(\AppBundle\Entity\Comment $comment)
    {
        $this->comments[] = $comment;

        return $this;
    }

    /**
     * Remove comment
     *
     * @param \AppBundle\Entity\Comment $comment
     */
    public function removeComment(\AppBundle\Entity\Comment $comment)
    {
        $this->comments->removeElement($comment);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComments()
    {
        return $this->comments;
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

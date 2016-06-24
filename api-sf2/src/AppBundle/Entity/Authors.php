<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\JoinTable;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\OneToMany;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;
use Symfony\Component\DependencyInjection\Tests\A;

/**
 * Authors
 *
 * @ORM\Table(name="authors")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AuthorRepository")
 */
class Authors
{

    use ORMBehaviors\SoftDeletable\SoftDeletable ,
        ORMBehaviors\Timestampable\Timestampable;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="born", type="integer", nullable=true)
     */
    private $born;

    /**
     * @var integer
     *
     * @ORM\Column(name="born_range", type="smallint", nullable=true)
     */
    private $bornRange;

    /**
     * @var integer
     *
     * @ORM\Column(name="died", type="integer", nullable=true)
     */
    private $died;

    /**
     * @var integer
     *
     * @ORM\Column(name="died_range", type="smallint", nullable=true)
     */
    private $diedRange;

    /**
     * @var integer
     *
     * @ORM\Column(name="activity", type="smallint", nullable=true)
     */
    private $activity;

    /**
     * @var integer
     *
     * @ORM\Column(name="activity_range", type="smallint", nullable=true)
     */
    private $activityRange;

    /**
     * @OneToMany(targetEntity="AuthorsTranslations", mappedBy="author")
     */
    private $authorTranslations;

    /**
     * @ManyToOne(targetEntity="Cities")
     * @JoinColumn(name="city_born_id", referencedColumnName="id", onDelete="SET NULL")
     */
    private $bornCity;

    /**
     * @ManyToOne(targetEntity="Cities")
     * @JoinColumn(name="city_died_id", referencedColumnName="id", onDelete="SET NULL")
     */
    private $diedCity;

    /**
     * @ManyToOne(targetEntity="Eras")
     * @JoinColumn(name="era_id", referencedColumnName="id", onDelete="SET NULL")
     */
    private $era;

    /**
     * @ManyToMany(targetEntity="Entities", mappedBy="authors")
     */
    private $entities;

    /**
     * @ManyToMany(targetEntity="Images")
     * @JoinTable(name="authors_images_assoc",
     *      joinColumns={@JoinColumn(name="author_id", referencedColumnName="id")},
     *      inverseJoinColumns={@JoinColumn(name="image_id", referencedColumnName="id")}
     *      )
     */
    private $images;

    public function __construct ()
    {
        $this->authorTranslations = new ArrayCollection();
        $this->entities           = new ArrayCollection();
        $this->images             = new ArrayCollection();
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
     * Set born
     *
     * @param integer $born
     *
     * @return Authors
     */
    public function setBorn($born)
    {
        $this->born = $born;

        return $this;
    }

    /**
     * Get born
     *
     * @return integer
     */
    public function getBorn()
    {
        return $this->born;
    }

    /**
     * Set bornRange
     *
     * @param integer $bornRange
     *
     * @return Authors
     */
    public function setBornRange($bornRange)
    {
        $this->bornRange = $bornRange;

        return $this;
    }

    /**
     * Get bornRange
     *
     * @return integer
     */
    public function getBornRange()
    {
        return $this->bornRange;
    }

    /**
     * Set died
     *
     * @param integer $died
     *
     * @return Authors
     */
    public function setDied($died)
    {
        $this->died = $died;

        return $this;
    }

    /**
     * Get died
     *
     * @return integer
     */
    public function getDied()
    {
        return $this->died;
    }

    /**
     * Set diedRange
     *
     * @param integer $diedRange
     *
     * @return Authors
     */
    public function setDiedRange($diedRange)
    {
        $this->diedRange = $diedRange;

        return $this;
    }

    /**
     * Get diedRange
     *
     * @return integer
     */
    public function getDiedRange()
    {
        return $this->diedRange;
    }

    /**
     * Set activity
     *
     * @param integer $activity
     *
     * @return Authors
     */
    public function setActivity($activity)
    {
        $this->activity = $activity;

        return $this;
    }

    /**
     * Get activity
     *
     * @return integer
     */
    public function getActivity()
    {
        return $this->activity;
    }

    /**
     * Set activityRange
     *
     * @param integer $activityRange
     *
     * @return Authors
     */
    public function setActivityRange($activityRange)
    {
        $this->activityRange = $activityRange;

        return $this;
    }

    /**
     * Get activityRange
     *
     * @return integer
     */
    public function getActivityRange()
    {
        return $this->activityRange;
    }

    /**
     * Add authorTranslation
     *
     * @param \AppBundle\Entity\AuthorsTranslations $authorTranslation
     *
     * @return Authors
     */
    public function addAuthorTranslation(\AppBundle\Entity\AuthorsTranslations $authorTranslation)
    {
        $this->authorTranslations[] = $authorTranslation;

        return $this;
    }

    /**
     * Remove authorTranslation
     *
     * @param \AppBundle\Entity\AuthorsTranslations $authorTranslation
     */
    public function removeAuthorTranslation(\AppBundle\Entity\AuthorsTranslations $authorTranslation)
    {
        $this->authorTranslations->removeElement($authorTranslation);
    }

    /**
     * Get authorTranslations
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAuthorTranslations()
    {
        return $this->authorTranslations;
    }

    /**
     * Set bornCity
     *
     * @param \AppBundle\Entity\Cities $bornCity
     *
     * @return Authors
     */
    public function setBornCity(\AppBundle\Entity\Cities $bornCity = null)
    {
        $this->bornCity = $bornCity;

        return $this;
    }

    /**
     * Get bornCity
     *
     * @return \AppBundle\Entity\Cities
     */
    public function getBornCity()
    {
        return $this->bornCity;
    }

    /**
     * Set diedCity
     *
     * @param \AppBundle\Entity\Cities $diedCity
     *
     * @return Authors
     */
    public function setDiedCity(\AppBundle\Entity\Cities $diedCity = null)
    {
        $this->diedCity = $diedCity;

        return $this;
    }

    /**
     * Get diedCity
     *
     * @return \AppBundle\Entity\Cities
     */
    public function getDiedCity()
    {
        return $this->diedCity;
    }

    /**
     * Set era
     *
     * @param \AppBundle\Entity\Eras $era
     *
     * @return Authors
     */
    public function setEra(\AppBundle\Entity\Eras $era = null)
    {
        $this->era = $era;

        return $this;
    }

    /**
     * Get era
     *
     * @return \AppBundle\Entity\Eras
     */
    public function getEra()
    {
        return $this->era;
    }

    /**
     * Add entity
     *
     * @param \AppBundle\Entity\Entities $entity
     *
     * @return Authors
     */
    public function addEntity(\AppBundle\Entity\Entities $entity)
    {
        $this->entities[] = $entity;

        return $this;
    }

    /**
     * Remove entity
     *
     * @param \AppBundle\Entity\Entities $entity
     */
    public function removeEntity(\AppBundle\Entity\Entities $entity)
    {
        $this->entities->removeElement($entity);
    }

    /**
     * Get entities
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEntities()
    {
        return $this->entities;
    }

    /**
     * Add image
     *
     * @param \AppBundle\Entity\Images $image
     *
     * @return Authors
     */
    public function addImage(\AppBundle\Entity\Images $image)
    {
        $this->images[] = $image;

        return $this;
    }

    /**
     * Remove image
     *
     * @param \AppBundle\Entity\Images $image
     */
    public function removeImage(\AppBundle\Entity\Images $image)
    {
        $this->images->removeElement($image);
    }

    /**
     * Get images
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getImages()
    {
        return $this->images;
    }
}
<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Box
 *
 * @ORM\Table(name="box")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BoxRepository")
 */
class Box
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var float
     *
     * @ORM\Column(name="latitude", type="float")
     */
    private $latitude;

    /**
     * @var float
     *
     * @ORM\Column(name="longitude", type="float")
     */
    private $longitude;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="zip_code", type="string", length=255, nullable=true)
     */
    private $zipCode;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255, nullable=true)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text", nullable=true)
     */
    private $comment;
    
    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     * 
     * @ORM\OneToMany(targetEntity="Borrow", mappedBy="boxFrom")
     */
    private $borrowsFrom;
    
    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     * 
     * @ORM\OneToMany(targetEntity="Borrow", mappedBy="boxTo")
     */
    private $borrowsTo;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set latitude
     *
     * @param float $latitude
     *
     * @return Box
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param float $longitude
     *
     * @return Box
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Box
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set zipCode
     *
     * @param string $zipCode
     *
     * @return Box
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    /**
     * Get zipCode
     *
     * @return string
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return Box
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return Box
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->borrowsFrom = new \Doctrine\Common\Collections\ArrayCollection();
        $this->borrowsTo = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add borrowsFrom
     *
     * @param \AppBundle\Entity\Borrow $borrowsFrom
     *
     * @return Box
     */
    public function addBorrowsFrom(\AppBundle\Entity\Borrow $borrowsFrom)
    {
        $this->borrowsFrom[] = $borrowsFrom;

        return $this;
    }

    /**
     * Remove borrowsFrom
     *
     * @param \AppBundle\Entity\Borrow $borrowsFrom
     */
    public function removeBorrowsFrom(\AppBundle\Entity\Borrow $borrowsFrom)
    {
        $this->borrowsFrom->removeElement($borrowsFrom);
    }

    /**
     * Get borrowsFrom
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBorrowsFrom()
    {
        return $this->borrowsFrom;
    }

    /**
     * Add borrowsTo
     *
     * @param \AppBundle\Entity\Borrow $borrowsTo
     *
     * @return Box
     */
    public function addBorrowsTo(\AppBundle\Entity\Borrow $borrowsTo)
    {
        $this->borrowsTo[] = $borrowsTo;

        return $this;
    }

    /**
     * Remove borrowsTo
     *
     * @param \AppBundle\Entity\Borrow $borrowsTo
     */
    public function removeBorrowsTo(\AppBundle\Entity\Borrow $borrowsTo)
    {
        $this->borrowsTo->removeElement($borrowsTo);
    }

    /**
     * Get borrowsTo
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBorrowsTo()
    {
        return $this->borrowsTo;
    }
}

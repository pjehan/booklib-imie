<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Borrow
 *
 * @ORM\Table(name="borrow")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BorrowRepository")
 */
class Borrow
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
     * @var \DateTime
     *
     * @ORM\Column(name="date_start", type="date", nullable=true)
     */
    private $dateStart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_end", type="date", nullable=true)
     */
    private $dateEnd;
    
    /**
     * @var Book
     * 
     * @ORM\ManyToOne(targetEntity="Book", inversedBy="borrows")
     * @ORM\JoinColumn(name="book_id", referencedColumnName="id")
     */
    private $book;
    
    /**
     * @var User
     * 
     * @ORM\ManyToOne(targetEntity="User", inversedBy="borrows")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;
    
    /**
     * @var Box
     * 
     * @ORM\ManyToOne(targetEntity="Box", inversedBy="borrowsFrom")
     * @ORM\JoinColumn(name="box_from_id", referencedColumnName="id")
     */
    private $boxFrom;
    
    /**
     * @var Box
     * 
     * @ORM\ManyToOne(targetEntity="Box", inversedBy="borrowsTo")
     * @ORM\JoinColumn(name="box_to_id", referencedColumnName="id")
     */
    private $boxTo;


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
     * Set dateStart
     *
     * @param \DateTime $dateStart
     *
     * @return Borrow
     */
    public function setDateStart($dateStart)
    {
        $this->dateStart = $dateStart;

        return $this;
    }

    /**
     * Get dateStart
     *
     * @return \DateTime
     */
    public function getDateStart()
    {
        return $this->dateStart;
    }

    /**
     * Set dateEnd
     *
     * @param \DateTime $dateEnd
     *
     * @return Borrow
     */
    public function setDateEnd($dateEnd)
    {
        $this->dateEnd = $dateEnd;

        return $this;
    }

    /**
     * Get dateEnd
     *
     * @return \DateTime
     */
    public function getDateEnd()
    {
        return $this->dateEnd;
    }

    /**
     * Set book
     *
     * @param \AppBundle\Entity\Book $book
     *
     * @return Borrow
     */
    public function setBook(\AppBundle\Entity\Book $book = null)
    {
        $this->book = $book;

        return $this;
    }

    /**
     * Get book
     *
     * @return \AppBundle\Entity\Book
     */
    public function getBook()
    {
        return $this->book;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Borrow
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
     * Set boxFrom
     *
     * @param \AppBundle\Entity\Box $boxFrom
     *
     * @return Borrow
     */
    public function setBoxFrom(\AppBundle\Entity\Box $boxFrom = null)
    {
        $this->boxFrom = $boxFrom;

        return $this;
    }

    /**
     * Get boxFrom
     *
     * @return \AppBundle\Entity\Box
     */
    public function getBoxFrom()
    {
        return $this->boxFrom;
    }

    /**
     * Set boxTo
     *
     * @param \AppBundle\Entity\Box $boxTo
     *
     * @return Borrow
     */
    public function setBoxTo(\AppBundle\Entity\Box $boxTo = null)
    {
        $this->boxTo = $boxTo;

        return $this;
    }

    /**
     * Get boxTo
     *
     * @return \AppBundle\Entity\Box
     */
    public function getBoxTo()
    {
        return $this->boxTo;
    }
}

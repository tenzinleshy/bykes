<?php

namespace OrderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Customer
 *
 * @ORM\Table(name="customer")
 * @ORM\Entity(repositoryClass="OrderBundle\Repository\CustomerRepository")
 */
class Customer
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
     * @ORM\OneToMany(targetEntity="OrderRequest", mappedBy="customer")
     */
    private $orderRequests;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string")
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string")
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="string")
     */
    private $comment;


    public function __construct()
    {
        $this->orderRequests = new ArrayCollection();
    }

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
     * @return ArrayCollection
     */
    public function getOrderRequests()
    {
        return $this->orderRequests;
    }

    /**
     * @param OrderRequest $orderRequest
     * @return Customer
     */
    public function addOrderRequest($orderRequest)
    {
        if (!$this->orderRequests->contains($orderRequest)) {
            $this->orderRequests->add($orderRequest);
        }

        return $this;
    }

    /**
     * @param OrderRequest $orderRequest
     * @return Customer
     */
    public function removeOrderRequest($orderRequest)
    {
        if ($this->orderRequests->contains($orderRequest)) {
            $this->orderRequests->removeElement($orderRequest);
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     * @return Customer
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Customer
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     * @return Customer
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }


}



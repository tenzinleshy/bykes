<?php

namespace OrderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Specialist
 *
 * @ORM\Table(name="specialist")
 * @ORM\Entity(repositoryClass="OrderBundle\Repository\SpecialistRepository")
 */
class Specialist
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
     * @ORM\OneToMany(targetEntity="OrderRequest", mappedBy="specialist")
     */
    private $orderRequests;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string")
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string")
     */
    private $lastName;


    public function __construct()
    {
        $this->orderRequests = new ArrayCollection();
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
     * @return Specialist
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
     * @return Specialist
     */
    public function removeOrderRequest($orderRequest)
    {
        if ($this->orderRequests->contains($orderRequest)) {
            $this->orderRequests->removeElement($orderRequest);
        }

        return $this;
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
     * @param int $id
     * @return Specialist
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return Specialist
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return Specialist
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

}


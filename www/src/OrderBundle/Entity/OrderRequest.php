<?php

namespace OrderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OrderRequest
 *
 * @ORM\Table(name="order_request")
 * @ORM\Entity(repositoryClass="OrderBundle\Repository\OrderRequestRepository")
 */
class OrderRequest
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
     * @ORM\ManyToOne(targetEntity="Customer", inversedBy="orderRequests")
     * @ORM\JoinColumn(name="customer_id", referencedColumnName="id")
     */
    private $customer;

    /**
     * @ORM\ManyToOne(targetEntity="Specialist", inversedBy="orderRequests")
     * @ORM\JoinColumn(name="specialist_id", referencedColumnName="id")
     */
    private $specialist;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", columnDefinition="enum('requested', 'on_the_way', 'in_progress', 'done', 'canceled')")
     */
    private $status = 'requested';


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
     * @return OrderRequest
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param Customer $customer
     * @return OrderRequest
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * @return Specialist
     */
    public function getSpecialist()
    {
        return $this->specialist;
    }

    /**
     * @param Specialist $specialist
     * @return OrderRequest
     */
    public function setSpecialist($specialist)
    {
        $this->specialist = $specialist;

        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return OrderRequest
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }


}


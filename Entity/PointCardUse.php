<?php

namespace MCM\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PointCard
 *
 * @ORM\Table(name="Use_PointCard")
 * @ORM\Entity
 */
class PointCardUse
{
    /**
     * @ORM\Column(name="id",type="integer",nullable=false)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="Cus_id",type="integer",nullable=false)
     */
    private $cusId;

    /**
     * @ORM\Column(name="PointCard_id",type="integer",nullable=false)
     */
    private $pointCardId;

    /**
     * @ORM\Column(name="amount",type="integer",nullable=false)
     */
    private $amount;

    /**
     * @ORM\Column(name="Order_id",type="integer", nullable=false)
     */
    private $orderId;

    /**
     * @ORM\Column(name="time",type="datetime", nullable=false)
     */
    private $time;


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
     * Set cusId
     *
     * @param integer $cusId
     *
     * @return PointCardUse
     */
    public function setCusId($cusId)
    {
        $this->cusId = $cusId;

        return $this;
    }

    /**
     * Get cusId
     *
     * @return integer
     */
    public function getCusId()
    {
        return $this->cusId;
    }

    /**
     * Set pointCardId
     *
     * @param integer $pointCardId
     *
     * @return PointCardUse
     */
    public function setPointCardId($pointCardId)
    {
        $this->pointCardId = $pointCardId;

        return $this;
    }

    /**
     * Get pointCardId
     *
     * @return integer
     */
    public function getPointCardId()
    {
        return $this->pointCardId;
    }

    /**
     * Set amount
     *
     * @param integer $amount
     *
     * @return PointCardUse
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return integer
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set orderId
     *
     * @param integer $orderId
     *
     * @return PointCardUse
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;

        return $this;
    }

    /**
     * Get orderId
     *
     * @return integer
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * @return \DateTime
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param \DateTime $time
     *
     * @return PointCardUse
     */
    public function setTime(\DateTime $time)
    {
        $this->time = $time;

        return $this;
    }
}


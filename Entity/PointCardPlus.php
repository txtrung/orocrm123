<?php

namespace MCM\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Plus_PointCard
 *
 * @ORM\Table(name="Plus_PointCard")
 * @ORM\Entity
 */
class PointCardPlus
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
     * @ORM\Column(name="reason",type="string", length=255, nullable=false)
     */
    private $reason;

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
     * @return PointCardPlus
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
     * @return PointCardPlus
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
     * @return PointCardPlus
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
     * Set reason
     *
     * @param string $reason
     *
     * @return PointCardPlus
     */
    public function setReason($reason)
    {
        $this->reason = $reason;

        return $this;
    }

    /**
     * Get reason
     *
     * @return string
     */
    public function getReason()
    {
        return $this->reason;
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
     * @return PointCardPlus
     */
    public function setTime(\DateTime $time)
    {
        $this->time = $time;

        return $this;
    }
}


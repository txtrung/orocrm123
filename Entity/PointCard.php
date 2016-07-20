<?php

namespace MCM\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PointCard
 *
 * @ORM\Table(name="PointCard")
 * @ORM\Entity
 */
class PointCard
{
    /**
     * @ORM\Column(name="id",type="integer",nullable=false)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="cus_id",type="integer",nullable=false)
     */
    private $cusId;

    /**
     * @ORM\Column(name="channel_id",type="integer",nullable=false)
     */
    private $channelId;

    /**
     * @ORM\Column(name="integration_channel_id",type="integer",nullable=false)
     */
    private $integrationChannelId;

    /**
     * @ORM\Column(name="owner_id",type="integer", nullable=false)
     */
    private $ownerId;

    /**
     * @ORM\Column(name="type",type="string", length=255, nullable=false)
     */
    private $type;

    /**
     * @ORM\Column(name="status",type="string", length=255, nullable=false)
     */
    private $status;


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
     * @return PointCard
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
     * Set channelId
     *
     * @param integer $channelId
     *
     * @return PointCard
     */
    public function setChannelId($channelId)
    {
        $this->channelId = $channelId;

        return $this;
    }

    /**
     * Get channelId
     *
     * @return integer
     */
    public function getChannelId()
    {
        return $this->channelId;
    }

    /**
     * Set integrationChannelId
     *
     * @param integer $integrationChannelId
     *
     * @return PointCard
     */
    public function setIntegrationChannelId($integrationChannelId)
    {
        $this->integrationChannelId = $integrationChannelId;

        return $this;
    }

    /**
     * Get integrationChannelId
     *
     * @return integer
     */
    public function getIntegrationChannelId()
    {
        return $this->integrationChannelId;
    }

    /**
     * Set ownerId
     *
     * @param integer $ownerId
     *
     * @return PointCard
     */
    public function setOwnerId($ownerId)
    {
        $this->ownerId = $ownerId;

        return $this;
    }

    /**
     * Get ownerId
     *
     * @return integer
     */
    public function getOwnerId()
    {
        return $this->ownerId;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return PointCard
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return PointCard
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }
}


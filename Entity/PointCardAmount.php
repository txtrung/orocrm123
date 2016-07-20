<?php

namespace MCM\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PointCard
 *
 * @ORM\Table(name="PointCard_amount")
 * @ORM\Entity
 */
class PointCardAmount
{
    /**
     * @ORM\Column(name="PointCard_id",type="integer",nullable=false)
     */
    private $pointCardId;

    /**
     * @ORM\Column(name="amount",type="integer",nullable=false)
     */
    private $amount;


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
     * @return PointCardAmount
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

}


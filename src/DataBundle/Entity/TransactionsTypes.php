<?php

namespace DataBundle\Entity;

/**
 * TransactionsTypes
 */
class TransactionsTypes
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var integer
     */
    private $percentage;

    /**
     * @var integer
     */
    private $amount;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $children;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $transactions;

    /**
     * @var \DataBundle\Entity\TransactionsTypes
     */
    private $parent;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->children = new \Doctrine\Common\Collections\ArrayCollection();
        $this->transactions = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     *
     * @return TransactionsTypes
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set percentage
     *
     * @param integer $percentage
     *
     * @return TransactionsTypes
     */
    public function setPercentage($percentage)
    {
        $this->percentage = $percentage;

        return $this;
    }

    /**
     * Get percentage
     *
     * @return integer
     */
    public function getPercentage()
    {
        return $this->percentage;
    }

    /**
     * Set amount
     *
     * @param integer $amount
     *
     * @return TransactionsTypes
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
     * Add child
     *
     * @param \DataBundle\Entity\TransactionsTypes $child
     *
     * @return TransactionsTypes
     */
    public function addChild(\DataBundle\Entity\TransactionsTypes $child)
    {
        $this->children[] = $child;

        return $this;
    }

    /**
     * Remove child
     *
     * @param \DataBundle\Entity\TransactionsTypes $child
     */
    public function removeChild(\DataBundle\Entity\TransactionsTypes $child)
    {
        $this->children->removeElement($child);
    }

    /**
     * Get children
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Add transaction
     *
     * @param \DataBundle\Entity\Transactions $transaction
     *
     * @return TransactionsTypes
     */
    public function addTransaction(\DataBundle\Entity\Transactions $transaction)
    {
        $this->transactions[] = $transaction;

        return $this;
    }

    /**
     * Remove transaction
     *
     * @param \DataBundle\Entity\Transactions $transaction
     */
    public function removeTransaction(\DataBundle\Entity\Transactions $transaction)
    {
        $this->transactions->removeElement($transaction);
    }

    /**
     * Get transactions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTransactions()
    {
        return $this->transactions;
    }

    /**
     * Set parent
     *
     * @param \DataBundle\Entity\TransactionsTypes $parent
     *
     * @return TransactionsTypes
     */
    public function setParent(\DataBundle\Entity\TransactionsTypes $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \DataBundle\Entity\TransactionsTypes
     */
    public function getParent()
    {
        return $this->parent;
    }
}

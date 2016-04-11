<?php

namespace DataBundle\Entity;

/**
 * Transactions
 */
class Transactions
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $amount;

    /**
     * @var integer
     */
    private $time;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $transactionsdatas;

    /**
     * @var \DataBundle\Entity\Users
     */
    private $from;

    /**
     * @var \DataBundle\Entity\Users
     */
    private $to;

    /**
     * @var \DataBundle\Entity\TransactionsTypes
     */
    private $transactionstypes;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->transactionsdatas = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set amount
     *
     * @param integer $amount
     *
     * @return Transactions
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
     * Set time
     *
     * @param integer $time
     *
     * @return Transactions
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time
     *
     * @return integer
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Add transactionsdata
     *
     * @param \DataBundle\Entity\TransactionsDatas $transactionsdata
     *
     * @return Transactions
     */
    public function addTransactionsdata(\DataBundle\Entity\TransactionsDatas $transactionsdata)
    {
        $this->transactionsdatas[] = $transactionsdata;

        return $this;
    }

    /**
     * Remove transactionsdata
     *
     * @param \DataBundle\Entity\TransactionsDatas $transactionsdata
     */
    public function removeTransactionsdata(\DataBundle\Entity\TransactionsDatas $transactionsdata)
    {
        $this->transactionsdatas->removeElement($transactionsdata);
    }

    /**
     * Get transactionsdatas
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTransactionsdatas()
    {
        return $this->transactionsdatas;
    }

    /**
     * Set from
     *
     * @param \DataBundle\Entity\Users $from
     *
     * @return Transactions
     */
    public function setFrom(\DataBundle\Entity\Users $from = null)
    {
        $this->from = $from;

        return $this;
    }

    /**
     * Get from
     *
     * @return \DataBundle\Entity\Users
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * Set to
     *
     * @param \DataBundle\Entity\Users $to
     *
     * @return Transactions
     */
    public function setTo(\DataBundle\Entity\Users $to = null)
    {
        $this->to = $to;

        return $this;
    }

    /**
     * Get to
     *
     * @return \DataBundle\Entity\Users
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * Set transactionstypes
     *
     * @param \DataBundle\Entity\TransactionsTypes $transactionstypes
     *
     * @return Transactions
     */
    public function setTransactionstypes(\DataBundle\Entity\TransactionsTypes $transactionstypes = null)
    {
        $this->transactionstypes = $transactionstypes;

        return $this;
    }

    /**
     * Get transactionstypes
     *
     * @return \DataBundle\Entity\TransactionsTypes
     */
    public function getTransactionstypes()
    {
        return $this->transactionstypes;
    }
}

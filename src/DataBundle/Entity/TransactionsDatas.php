<?php

namespace DataBundle\Entity;

/**
 * TransactionsDatas
 */
class TransactionsDatas
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $index;

    /**
     * @var string
     */
    private $value;

    /**
     * @var \DataBundle\Entity\Transactions
     */
    private $transactions;


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
     * Set index
     *
     * @param string $index
     *
     * @return TransactionsDatas
     */
    public function setIndex($index)
    {
        $this->index = $index;

        return $this;
    }

    /**
     * Get index
     *
     * @return string
     */
    public function getIndex()
    {
        return $this->index;
    }

    /**
     * Set value
     *
     * @param string $value
     *
     * @return TransactionsDatas
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set transactions
     *
     * @param \DataBundle\Entity\Transactions $transactions
     *
     * @return TransactionsDatas
     */
    public function setTransactions(\DataBundle\Entity\Transactions $transactions = null)
    {
        $this->transactions = $transactions;

        return $this;
    }

    /**
     * Get transactions
     *
     * @return \DataBundle\Entity\Transactions
     */
    public function getTransactions()
    {
        return $this->transactions;
    }
}

<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Invoicelineitems
 *
 * @ORM\Table(name="invoicelineitems")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\InvoicelineitemsRepository")
 */
class Invoicelineitems
{
    /**
     * @var string
     * @ORM\Id
     * @ORM\Column(name="invoice_num", type="string", length=11)
     */
    private $invoiceNum;

    /**
     * @var string
     *
     * @ORM\Column(name="product_id", type="string", length=200)
     */
    private $productId;

    /**
     * @var string
     *
     * @ORM\Column(name="qty", type="decimal", precision=10, scale=2)
     */
    private $qty;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="decimal", precision=10, scale=2)
     */
    private $price;

    /**
     * Set invoiceNum
     *
     * @param string $invoiceNum
     *
     * @return Invoicelineitems
     */
    public function setInvoiceNum($invoiceNum)
    {
        $this->invoiceNum = $invoiceNum;

        return $this;
    }

    /**
     * Get invoiceNum
     *
     * @return string
     */
    public function getInvoiceNum()
    {
        return $this->invoiceNum;
    }

    /**
     * Set productId
     *
     * @param string $productId
     *
     * @return Invoicelineitems
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;

        return $this;
    }

    /**
     * Get productId
     *
     * @return string
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * Set qty
     *
     * @param string $qty
     *
     * @return Invoicelineitems
     */
    public function setQty($qty)
    {
        $this->qty = $qty;

        return $this;
    }

    /**
     * Get qty
     *
     * @return string
     */
    public function getQty()
    {
        return $this->qty;
    }

    /**
     * Set price
     *
     * @param string $price
     *
     * @return Invoicelineitems
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }
}


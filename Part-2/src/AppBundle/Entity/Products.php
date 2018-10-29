<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Products
 *
 * @ORM\Table(name="products")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProductsRepository")
 */
class Products
{
    /**
     * @var string
     * @ORM\Id
     * @ORM\Column(name="product_id", type="string", length=70)
     */
    private $productId;

    /**
     * @var string
     *
     * @ORM\Column(name="client_id", type="string", length=36)
     */
    private $clientId;

    /**
     * @var string
     *
     * @ORM\Column(name="product_description", type="string", length=252)
     */
    private $productDescription;


   /**
     * Set productId
     *
     * @param string $productId
     *
     * @return Products
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
     * Set clientId
     *
     * @param string $clientId
     *
     * @return Products
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;

        return $this;
    }

    /**
     * Get clientId
     *
     * @return string
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * Set productDescription
     *
     * @param string $productDescription
     *
     * @return Products
     */
    public function setProductDescription($productDescription)
    {
        $this->productDescription = $productDescription;

        return $this;
    }

    /**
     * Get productDescription
     *
     * @return string
     */
    public function getProductDescription()
    {
        return $this->productDescription;
    }
}


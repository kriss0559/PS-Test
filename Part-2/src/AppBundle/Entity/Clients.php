<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * clients
 *
 * @ORM\Table(name="clients")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ClientsRepository")
 */
class Clients {

    /**
     * @var string
     * @ORM\Id
     * @ORM\Column(name="client_id", type="string", length=36)
     */
    private $clientId;

    /**
     * @var string
     *
     * @ORM\Column(name="client_name", type="string", length=200)
     */
    private $clientName;

    /**
     * Set clientId
     *
     * @param string $clientId
     *
     * @return clients
     */
    public function setClientId($clientId) {
        $this->clientId = $clientId;

        return $this;
    }

    /**
     * Get clientId
     *
     * @return string
     */
    public function getClientId() {
        return $this->clientId;
    }

    /**
     * Set clientName
     *
     * @param string $clientName
     *
     * @return clients
     */
    public function setClientName($clientName) {
        $this->clientName = $clientName;

        return $this;
    }

    /**
     * Get clientName
     *
     * @return string
     */
    public function getClientName() {
        return $this->clientName;
    }

}

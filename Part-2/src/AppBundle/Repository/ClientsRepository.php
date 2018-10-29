<?php

namespace AppBundle\Repository;

/**
 * clientsRepository
 *
 * This class was generated for clients entity.
 * @author Kishor Parmar <kishor_parmar05@yahoo.com>
 */
class ClientsRepository extends \Doctrine\ORM\EntityRepository {
    /**
     * findAll
     * 
     * Get records.
     * 
     * @author Kishor Parmar <kishor_parmar05@yahoo.com>
     * @return array
     */
    public function findAll() {
        $query = $this->_em->createQuery('
            SELECT cli.clientId,cli.clientName FROM AppBundle:Clients cli
            ');

        $result = $query->getArrayResult();
        return $result;
    }

}

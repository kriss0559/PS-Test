<?php

namespace AppBundle\Repository;

/**
 * ProductsRepository
 *
 * This class was generated for Products entity.
 * @author Kishor Parmar <kishor_parmar05@yahoo.com>
 */
class ProductsRepository extends \Doctrine\ORM\EntityRepository {

    /**
     * findAllByClientId
     * 
     * Get records from AppBundle:Products entity based on clientId.
     * 
     * @param clientId
     * @author Kishor Parmar <kishor_parmar05@yahoo.com>
     * 
     * @return array
     */
    public function findAllByClientId($clientId) {
        $query = $this->_em->createQuery('
                SELECT P.productId,P.productDescription FROM AppBundle:Products P            
                WHERE  P.clientId = :clientId                 
                ORDER BY P.productDescription ASC
            ')->setParameter('clientId', $clientId);

        return $query->getArrayResult();
    }

}

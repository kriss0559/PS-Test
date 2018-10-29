<?php

namespace AppBundle\Repository;

/**
 * InvoicelineitemsRepository
 *
 * This class was generated for InvoiceLIneitems entity.
 * @author Kishor Parmar <kishor_parmar05@yahoo.com>
 */
class InvoicelineitemsRepository extends \Doctrine\ORM\EntityRepository {

    /**
     * findAllReports
     * 
     * Get records based on filter selection.
     * 
     * @author Kishor Parmar <kishor_parmar05@yahoo.com>
     * 
     * @return array
     */
    public function findAllReports() {
        $query = $this->_em->createQuery('
                SELECT  ILI.productId,ILI.qty,ILI.price,P.productDescription,I.invoiceNum,I.invoiceDate 
                FROM AppBundle:Invoicelineitems ILI
                INNER JOIN AppBundle:Products P WITH P.productId = ILI.productId
                INNER JOIN AppBundle:Invoices I WITH I.invoiceNum = ILI.invoiceNum                
                ORDER BY ILI.invoiceNum ASC
            ');

        $result = $query->getArrayResult();
        return $result;
    }

    /**
     * findAllByClientId
     * 
     * Get records based on filter selection.
     * 
     * @param clientId, productId and relativeDates
     * @author Kishor Parmar <kishor_parmar05@yahoo.com>
     * 
     * @return array
     */
    public function findAllByClientId($clientId, $productId, $relativeDates) {

        $queryFilter = array();
        $filterString = "";
        if ($relativeDates != "") {
            if ($relativeDates == "LASTMONTHTODATE") {
                $start = date("Y-m-d", strtotime("-1 month"));
                $end = date("Y-m-d",  time());
            } else if ($relativeDates == "THISMONTH") {
                $start = date("Y-m-d", strtotime('first day of this month', time()));
                $end = date("Y-m-d", strtotime('last day of this month', time()));
            } else if ($relativeDates == "THISYEAR") {
                $start = date("Y-m-d", strtotime('first day of january', time()));
                $end = date("Y-m-d", strtotime('last day of december', time()));
            } else if ($relativeDates == "LASTYEAR") {
                $start = date("Y-m-d", strtotime('first day of january', strtotime('first day of previous year', time())));
                $end = date("Y-m-d", strtotime('last day of december', strtotime('first day of previous year', time())));
            }
            $queryFilter[] = "(I.invoiceDate>='" . $start . "' AND I.invoiceDate<='" . $end . "')";
        }
        if ($clientId != "") {
            $queryFilter[] = "(I.clientId = '" . $clientId . "')";
        }
        if ($productId != "") {
            $queryFilter[] = "(ILI.productId = '" . $productId . "')";
        }
        if (count($queryFilter) > 0)
            $filterString = " WHERE " . implode(" AND ", $queryFilter);

        $query = $this->_em->createQuery('
                SELECT ILI.productId,ILI.qty,ILI.price,P.productDescription,I.invoiceNum,I.invoiceDate FROM AppBundle:Invoicelineitems ILI
                INNER JOIN AppBundle:Products P WITH P.productId = ILI.productId
                INNER JOIN AppBundle:Invoices I WITH I.invoiceNum = ILI.invoiceNum                
                ' . $filterString . '
                ORDER BY ILI.invoiceNum ASC
            ');

        return $query->getArrayResult();
    }

}

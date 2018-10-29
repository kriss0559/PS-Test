<?php
/*
 * This file is for product listing page.
 *
 * Kishor Parmar <kishor_parmar05@yahoo.com>
 *
 */
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * I used default controller of the symfony to display product listing for Test
 *
 * @author Kishor Parmar <kishor_parmar05@yahoo.com>
 */
class DefaultController extends Controller {

    /**
     * indexAction
     * 
     * Get main report page
     * 
     * @param request
     * 
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request) {
        return $this->render('AppBundle::listProducts.html.twig', array());
    }

    /**
     * defaultAction
     * 
     * Get Client list and all records.
     * 
     * @Route("/filter", name="homepage_default", methods={"GET"})
     */
    public function defaultAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $products = $em->getRepository('AppBundle:Invoicelineitems')->findAllReports();
         $clients = $em->getRepository('AppBundle:Clients')->findAll();
       
         $clients = json_decode(json_encode($clients,true));
        
        return JsonResponse::create(array(
            'products' => $products,
             'clients' => $clients
                ), 200);
    }

    /**
     * productsAction
     * 
     * Ger product list based on client selection
     * 
     * @param client_id
     * @Route("/products", name="homepage_get_products", methods={"GET"})
     */
    public function productsAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $clientId = $request->query->get("client_id", "");
        $product_options = $em->getRepository('AppBundle:Products')->findAllByClientId($clientId);

        return JsonResponse::create(array(
            'product_options' => $product_options
                ), 200);
    }
    /**
     * filterAction
     * 
     * Get records based on filter selected.
     * 
     * @param client_id, product_id, relative_dates
     * @Route("/generate-report", name="homepage_filter", methods={"GET"})
     */
    public function filterAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $clientId = $request->query->get("client_id", "");
        $productId = $request->query->get("product_id", "");
        $relativeDates = $request->query->get("relative_dates", "");
        $products = $em->getRepository('AppBundle:Invoicelineitems')->findAllByClientId($clientId, $productId, $relativeDates);
     
        return JsonResponse::create(array(
                    'products' => $products
                        ), 200);
    }

}

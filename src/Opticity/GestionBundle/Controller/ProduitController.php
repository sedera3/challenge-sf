<?php
/**
 * Created by PhpStorm.
 * Date: 29/03/2018
 * Time: 06:06
 */

namespace Opticity\GestionBundle\Controller;


use FOS\RestBundle\Controller\Annotations\Delete;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Put;
use Opticity\GestionBundle\service\ProduitService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ProduitController extends Controller
{

    /**
     * Pour recuperer les produits
     * @Get("/product/{code}")
     * @param null $id
     * @param ProduitService $produitService
     * @return JsonResponse
     */
    public function getProduitAction($code = null, ProduitService $produitService) {
        $return = $produitService->getProduit($code);
        return new JsonResponse($return);
    }

    /**
     * Pour insertion des produits
     * @Put("/product")
     * @param Request $request
     * @param ProduitService $produitService
     * @return JsonResponse
     */
    public function putProduitAction(Request $request, ProduitService $produitService) {
        $produit = $request->get('product', '');
        $return = [];
        if (!empty($produit)) {
            $return = $produitService->putProduit($produit);
        }
        return new JsonResponse($return);
    }

    /**
     * Pour suppimer les produits
     * @Delete("/product/{id}")
     * @param null $id
     * @param ProduitService $produitService
     * @return JsonResponse
     */
    public function deleteProduitAction($id = null, ProduitService $produitService) {
        $return = $produitService->deleteProduit($id);
        return new JsonResponse($return);
    }
}
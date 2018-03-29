<?php
/**
 * Created by PhpStorm.
 * Date: 29/03/2018
 * Time: 10:09
 */

namespace Opticity\GestionBundle\Controller;


use FOS\RestBundle\Controller\Annotations\Delete;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Put;
use Opticity\GestionBundle\service\ProduitService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class TypeProduitController extends Controller
{
    /**
     * Pour recuperer les produits
     * @Get("/type/{id}")
     * @param null $id
     * @return JsonResponse
     */
    public function getTypeAction($id = null, ProduitService $produitService) {
        $return = $produitService->getTypeProduct();
        return new JsonResponse($return);
    }

    /**
     * Pour insertion des produits
     * @Put("/type")
     * @param Request $request
     * @param ProduitService $produitService
     * @return JsonResponse
     */
    public function putTypeAction(Request $request, ProduitService $produitService) {
        $type = $request->get('type', '');

        $return = [];
        if (!empty($type)) {
            $return = $produitService->putTypeProduit($type);
        }

        return new JsonResponse($return);
    }

    /**
     * Pour suppimer les produits
     * @Delete("/type/{id}")
     * @param null $id
     * @return JsonResponse
     */
    public function deleteTypeAction($id = null) {
        return new JsonResponse(['ers']);
    }
}
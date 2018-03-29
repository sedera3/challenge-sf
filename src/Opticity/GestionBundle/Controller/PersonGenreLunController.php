<?php
/**
 * Created by PhpStorm.
 * Date: 29/03/2018
 * Time: 10:12
 */

namespace Opticity\GestionBundle\Controller;


use FOS\RestBundle\Controller\Annotations\Delete;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Put;
use Opticity\GestionBundle\service\ProduitService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class PersonGenreLunController extends Controller
{
    /**
     * Pour recuperer les produits
     * @Get("/genre")
     * @return JsonResponse
     */
    public function getGenreAction(ProduitService $produitService) {
        $return = $produitService->getGenrePersProduit();
        return new JsonResponse($return);
    }

    /**
     * Pour insertion des genre
     * @Put("/genre")
     * @param Request $request
     * @return JsonResponse
     */
    public function putGenreAction(Request $request, ProduitService $produitService) {

        $genre = $request->get('genre', '');
        $return = [];
        if (!empty($genre)) {
            $return = $produitService->putGenrePersProduit($genre);
        }
        return new JsonResponse($return);
    }

    /**
     * Pour suppimer les produits
     * @Delete("/genre/{id}")
     * @param null $id
     * @return JsonResponse
     */
    public function deleteGenreAction($id = null) {
        return new JsonResponse(['ers']);
    }
}
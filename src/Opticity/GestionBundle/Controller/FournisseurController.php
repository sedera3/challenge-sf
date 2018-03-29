<?php
/**
 * Created by PhpStorm.
 * Date: 29/03/2018
 * Time: 09:59
 */

namespace Opticity\GestionBundle\Controller;


use FOS\RestBundle\Controller\Annotations\Delete;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Put;
use Opticity\GestionBundle\service\FournisseurService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class FournisseurController extends Controller
{
    /**
     * Pour recuperer les Fournisseurs
     * @Get("/fournisseur/{code}")
     * @param null $code
     * @return JsonResponse
     */
    public function getFournisseursAction($code = null, FournisseurService $fournisseurService) {

        $return = $fournisseurService->getFournisseur($code);
        return new JsonResponse($return);
    }

    /**
     * Pour insertion des Fournisseurs
     * @Put("/fournisseur")
     * @param Request $request
     * @return JsonResponse
     */
    public function putFournisseursAction(Request $request, FournisseurService $fournisseurService) {

        $fournissseur = $request->get('fournisseur', '');
        $return = [];
        if (!empty($fournissseur)) {
            $return = $fournisseurService->putFournisseur($fournissseur);
        }
        return new JsonResponse($return);
    }

    /**
     * Pour suppimer les Fournisseurs
     * @Delete("/fournisseur/{id}")
     * @param null $id
     * @return JsonResponse
     */
    public function deleteFournisseursAction($id, FournisseurService $fournisseurService) {

        if (empty($id)) {
            throw new \Exception('Id de fournisseur obligatoire. Penser à faire le get pour récuperer le id');
        }
        $return = $fournisseurService->deleteFournisseur($id);
        return new JsonResponse($return);
    }
}
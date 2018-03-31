<?php
/**
 * Created by PhpStorm.
 * Date: 29/03/2018
 * Time: 10:03
 */

namespace Opticity\GestionBundle\Controller;


use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Put;
use Opticity\GestionBundle\service\ClientService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ClientController extends Controller
{
    /**
     * Pour recuperer user
     * @Get("/client/{id}")
     * @param null $id
     * @param ClientService $userService
     * @return JsonResponse
     */
    public function getClientAction($id = null, ClientService $userService) {
        $return = $userService->getClient($id);
        return new JsonResponse($return);
    }

    /**
     * Pour insertion user
     * @Put("/client")
     * @param Request $request
     * @param ClientService $userService
     * @return JsonResponse
     * @throws \Exception
     */
    public function putClientAction(Request $request, ClientService $userService) {
        $user = $request->get('user', '');

        $return = [];
        if (!empty($user)) {
            $return = $userService->putClient($user);
        }

        return new JsonResponse($return);
    }
}
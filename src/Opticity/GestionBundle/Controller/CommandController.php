<?php
/**
 * Created by PhpStorm.
 * User: MADATALY
 * Date: 29/03/2018
 * Time: 20:49
 */

namespace Opticity\GestionBundle\Controller;


use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Put;
use FOS\RestBundle\Controller\Annotations\Delete;
use Opticity\GestionBundle\service\CommandService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class CommandController extends Controller
{
    /**
     * Pour recuperer les commandes
     * @Get("/command/{code}")
     * @param null $code
     * @param CommandService $commandService
     * @return JsonResponse
     */
    public function getCommandAction($code = null, CommandService $commandService) {
        $return = $commandService->getCommand($code);
        return new JsonResponse($return);
    }

    /**
     * Pour inserer les commandes
     * @Put("/command")
     * @param Request $request
     * @param CommandService $commandService
     * @return JsonResponse
     * @throws \Exception
     */
    public function putCommandAction(Request $request, CommandService $commandService) {
        $command = $request->get('command', '');
        $return = [];
        if (!empty($command)) {
            $return = $commandService->putCommand($command);
        }
        return new JsonResponse($return);
    }

    /**
     * Pour supprimer les commandes
     * @Delete("/command/{$id}")
     * @param null $id
     * @param CommandService $commandService
     * @return JsonResponse
     */
    public function deleteCommandAction($id = null, CommandService $commandService) {
        $return = $commandService->deleteCommand($id);
        return new JsonResponse($return);
    }
}
<?php
/**
 * Created by PhpStorm.
 * Date: 29/03/2018
 * Time: 10:03
 */

namespace Opticity\GestionBundle\Controller;


use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Put;
use Opticity\GestionBundle\service\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    /**
     * Pour recuperer user
     * @Get("/user/{id}")
     * @param null $id
     * @param UserService $userService
     * @return JsonResponse
     */
    public function getUserAction($id = null, UserService $userService) {
        $return = $userService->getUser($id);
        return new JsonResponse($return);
    }

    /**
     * Pour insertion user
     * @Put("/user")
     * @param Request $request
     * @param UserService $userService
     * @return JsonResponse
     */
    public function putUserAction(Request $request, UserService $userService) {
        $user = $request->get('user', '');

        $return = [];
        if (!empty($user)) {
            $return = $userService->putUser($user);
        }

        return new JsonResponse($return);
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: rmendes
 * Date: 22/12/2018
 * Time: 12:25
 */

namespace App\ApiBundle\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class DefaultController
 * @package App\ApiBundle\Controller
 */
class DefaultController extends BaseController
{
    /**
     * @return JsonResponse
     */
    public function statusAction()
    {
        return new JsonResponse(['status'=> 'OK']);
    }

}
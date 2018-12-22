<?php
/**
 * Created by PhpStorm.
 * User: rmendes
 * Date: 22/12/2018
 * Time: 12:20
 */

namespace App\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 * Class BaseController
 * @package App\ApiBundle\Controller
 */
class BaseController extends Controller
{
    /**
     * @const string DEFAULT_RESPONSE_FORMAT
     */
    const DEFAULT_RESPONSE_FORMAT = 'json';

    /**
     * @var Serializer $serializer
     */
    protected $serializer;

    /**
     * BaseController constructor.
     */
    public function __construct()
    {
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];

        $this->serializer = new Serializer($normalizers, $encoders);
    }

    /**
     * @param $data
     * @return Response
     */
    protected function getSuccessJsonResponse($data)
    {
        return new Response(
            $this->serializer->serialize($data, self::DEFAULT_RESPONSE_FORMAT),
            Response::HTTP_OK,
            ['Content-Type', 'application/json']
        );
    }

    /**
     * @param mixed $data
     * @return Response
     */
    protected function getForbiddenJsonResponse($data = null)
    {
        return new Response(
            $this->serializer->serialize($data, self::DEFAULT_RESPONSE_FORMAT),
            Response::HTTP_FORBIDDEN,
            ['Content-Type', 'application/json']
        );
    }

    /**
     * @param mixed $data
     * @return Response
     */
    protected function getNotFoundResponse($data)
    {
        return new Response(
            $this->serializer->serialize($data, self::DEFAULT_RESPONSE_FORMAT),
            Response::HTTP_NOT_FOUND,
            ['Content-Type', 'application/json']
        );
    }

    /**
     * @param mixed $data
     * @return Response
     */
    public function getServerErrorJsonResponse($data = null)
    {
        return new Response(
            $this->serializer->serialize($data, self::DEFAULT_RESPONSE_FORMAT),
            Response::HTTP_INTERNAL_SERVER_ERROR,
            ['Content-Type', 'application/json']
        );
    }

    /**
     * @param mixed $data
     * @return Response
     */
    protected function getNotImplementedErrorJsonResponse($data = null )
    {
        return new Response(
            $this->serializer->serialize($data, self::DEFAULT_RESPONSE_FORMAT),
            Response::HTTP_NOT_IMPLEMENTED,
            ['Content-Type', 'application/json']
        );
    }

    /**
     * @param FormInterface $data
     * @return Response
     */
    protected function getFormFailureJsonResponse(FormInterface $data)
    {
        return new Response(
            $this->serializer->serialize($data, self::DEFAULT_RESPONSE_FORMAT),
            Response::HTTP_NOT_FOUND,
            ['Content-Type', 'application/json']
        );
    }

    /**
     * @param FormInterface $form
     * @return array
     */
    protected function getErrorsFromForm(FormInterface $form)
    {
        $errors = array();
        foreach ($form->all() as $childForm) {
            if($childForm instanceof FormInterface) {
                if($childErrors = $this->getErrorsFromForm($childForm)) {
                    $errors[$childForm->getName()] = $childErrors;
                }
            }
        }
        return $errors;
    }

}
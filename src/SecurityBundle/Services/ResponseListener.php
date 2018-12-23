<?php
/**
 * Created by PhpStorm.
 * User: rmendes
 * Date: 22/12/2018
 * Time: 12:17
 */

namespace App\SecurityBundle\Services;

use Symfony\Component\HttpKernel\Event\FilterResponseEvent;

/**
 * Class ResponseListener
 * @package App\SecurityBundle\Services
 */
class ResponseListener
{

    /**
     * @var string $origin
     */
    private $origin;

    /**
     * ResponseListener constructor.
     *
     * @param $origin
     */
    public function __construct($origin)
    {
        $this->origin = $origin;
    }

    /**
     * @param FilterResponseEvent $event
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function onKernelResponse(FilterResponseEvent $event)
    {
        // Since nginx does not set the headers automatically for error messages, we need to add them manually
        $response = $event->getResponse();
        $response->headers->set('Access-Control-Allow-Origin', $this->origin);
        $response->headers->set('Access-Control-Allow-Credentials', 'true');
        $response->headers->set('Access-Control-Allow-Methods', 'POST, GET, PUT, DELETE, PATCH, OPTIONS');
        $response->headers->set('Access-Control-Allow-Headers', 'Origin, Content-Type, Accept, Authorization');
        $response->headers->set('Access-Control-Max-Age', 3600);
        $response->headers->set('Content-Type', 'application/json; charset=UTF-8');
    }


}
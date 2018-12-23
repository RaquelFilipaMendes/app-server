<?php
/**
 * Created by PhpStorm.
 * User: rmendes
 * Date: 22/12/2018
 * Time: 12:26
 */

namespace App\ApiBundle\Controller;

use App\StorageBundle\Model\PhoneNumbersModel;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class PhoneNumbersController
 * @package App\ApiBundle\Controller
 */
class PhoneNumbersController extends BaseController
{
    /**
     * @const string STATUS_FILTER
     */
    const STATUS_FILTER = 'status';

    /**
     * @const string COUNTRY_FILTER
     */
    const COUNTRY_FILTER = 'country';

    /**
     * @var PhoneNumbersModel $phoneNumbersModel
     */
    protected $phoneNumbersModel;

    /**
     * PhoneNumbersController constructor.
     * @param PhoneNumbersModel $phoneNumbersModel
     */
    public function __construct(PhoneNumbersModel $phoneNumbersModel)
    {
        parent::__construct();
        $this->phoneNumbersModel = $phoneNumbersModel;
    }


    /**
     * @return Response
     */
    public function listPhoneNumbersAction()
    {

        return $this->getSuccessJsonResponse($this->phoneNumbersModel->getAllPhoneNumbers());
    }
}
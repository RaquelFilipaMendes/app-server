<?php
/**
 * Created by PhpStorm.
 * User: rmendes
 * Date: 22/12/2018
 * Time: 12:26
 */

namespace App\ApiBundle\Controller;

use App\StorageBundle\Entity\PhoneNumbers;
use App\StorageBundle\Model\PhoneNumbersModel;

/**
 * Class PhoneNumbersController
 * @package App\ApiBundle\Controller
 */
class PhoneNumbersController extends BaseController
{
    /**
     * @var PhoneNumbersModel $phoneNumbersModel
     */
    protected $phoneNumbersModel;

    /**
     * PhoneNumbersController constructor.
     * @param PhoneNumbers $phoneNumbersModel
     */
    public function __construct(PhoneNumbers $phoneNumbersModel)
    {
        parent::__construct();
        $this->phoneNumbersModel = $phoneNumbersModel;
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listPhoneNumbersAction()
    {
        return $this->getSuccessJsonResponse($this->phoneNumbersModel->getAllPhoneNumbers());
    }

}
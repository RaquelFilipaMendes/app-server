<?php
/**
 * Created by PhpStorm.
 * User: rmendes
 * Date: 23/12/2018
 * Time: 09:55
 */

namespace App\ApiBundle\Controller;

use App\StorageBundle\Model\HelperCountryModel;

/**
 * Class HelperCountryController
 * @package App\ApiBundle\Controller
 */
class HelperCountryController extends BaseController
{
    /**
     * @var HelperCountryModel $helperCountryModel
     */
    protected $helperCountryModel;

    /**
     * HelperCountryController constructor.
     * @param HelperCountryModel $helperCountryModel
     */
    public function __construct(HelperCountryModel $helperCountryModel)
    {
        parent::__construct();
        $this->helperCountryModel = $helperCountryModel;
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listCountriesAction()
    {
        return $this->getSuccessJsonResponse($this->helperCountryModel->getAllCountries());
    }

}
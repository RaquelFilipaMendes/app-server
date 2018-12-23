<?php
/**
 * Created by PhpStorm.
 * User: rmendes
 * Date: 22/12/2018
 * Time: 13:38
 */

namespace App\StorageBundle\Model;


use App\ApiBundle\Controller\BaseController;
use App\StorageBundle\Repository\HelperCountryRepository;

/**
 * Class HelperCountryModel
 * @package App\StorageBundle\Model
 */
class HelperCountryModel extends BaseController
{
    /**
     * @var HelperCountryRepository $helperCountryRepository
     */
    private $helperCountryRepository;

    /**
     * HelperCountryModel constructor.
     * @param HelperCountryRepository $helperCountryRepository
     */
    public function __construct(
        HelperCountryRepository $helperCountryRepository
    ) {
        $this->helperCountryRepository = $helperCountryRepository;
    }

    /**
     * @return array
     */
    public function getAllCountries()
    {
        return $this->helperCountryRepository->findAll();
    }


}
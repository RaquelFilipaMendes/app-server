<?php
/**
 * Created by PhpStorm.
 * User: rmendes
 * Date: 22/12/2018
 * Time: 13:38
 */

namespace App\StorageBundle\Model;


use App\StorageBundle\Repository\HelperCountryRepository;

/**
 * Class HelperCountryModel
 * @package App\StorageBundle\Model
 */
class HelperCountryModel
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
}
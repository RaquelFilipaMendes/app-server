<?php
/**
 * Created by PhpStorm.
 * User: rmendes
 * Date: 22/12/2018
 * Time: 13:37
 */

namespace App\StorageBundle\Repository;


use App\StorageBundle\Model\HelperCountryModel;

class HelperCountryRepository extends EntityRepository
{
    /**
     * @param HelperCountryModel $helperCountry
     * @return HelperCountryModel
     */
    public function store(HelperCountryModel $helperCountry)
    {
        $this->_em->persist($helperCountry);
        $this->_em->flush();

        return $helperCountry;
    }

    /**
     * @param HelperCountryModel $helperCountry
     * @return HelperCountryModel
     */
    public function delete(HelperCountryModel $helperCountry)
    {
        $this->_em->remove($helperCountry);

        $this->_em->flush();

        return $helperCountry;
    }

}
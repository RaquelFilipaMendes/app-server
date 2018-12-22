<?php
/**
 * Created by PhpStorm.
 * User: rmendes
 * Date: 22/12/2018
 * Time: 12:27
 */

namespace App\StorageBundle\Repository;

use App\StorageBundle\Model\PhoneNumbersModel;
use Doctrine\ORM\EntityRepository;

/**
 * Class PhoneNumbersRepository
 * @package App\StorageBundle\Repository
 */
class PhoneNumbersRepository extends EntityRepository
{
    /**
     * @param PhoneNumbersModel $phoneNumbers
     * @return PhoneNumbersModel
     */
    public function store(PhoneNumbersModel $phoneNumbers)
    {
        $this->_em->persist($phoneNumbers);
        $this->_em->flush();

        return $phoneNumbers;
    }

    /**
     * @param PhoneNumbersModel $phoneNumbers
     * @return PhoneNumbersModel
     */
    public function delete(PhoneNumbersModel $phoneNumbers)
    {
        $this->_em->remove($phoneNumbers);

        $this->_em->flush();

        return $phoneNumbers;
    }


}
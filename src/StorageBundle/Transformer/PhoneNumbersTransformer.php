<?php
/**
 * Created by PhpStorm.
 * User: rmendes
 * Date: 22/12/2018
 * Time: 12:32
 */

namespace App\StorageBundle\Transformer;

use App\ApiBundle\Entity\PhoneNumbers as ApiPhoneNumbers;
use App\StorageBundle\Entity\PhoneNumbers as StoragePhoneNumbers;


/**
 * Class PhoneNumbersTransformer
 * @package App\StorageBundle\Transformer
 */
class PhoneNumbersTransformer
{

    /**
     * @param array $storagePhoneNumbers
     * @return ApiPhoneNumbers []
     */
    public function toMultipleApi (array $storagePhoneNumbers)
    {
        $listPhoneNumbers = [];
        foreach ($storagePhoneNumbers as $phoneNumbers) {
            $listPhoneNumbers[] = $this->toApi($phoneNumbers);
        }
        return $listPhoneNumbers;
    }

    /**
     * @param StoragePhoneNumbers $storagePhoneNumbers
     * @return ApiPhoneNumbers
     */
    public function toApi(StoragePhoneNumbers $storagePhoneNumbers)
    {
        return (new ApiPhoneNumbers())
            ->setId($storagePhoneNumbers->getId())
            ->setPhoneNumbers($storagePhoneNumbers->getPhoneNumber())
            ;
    }

    /**
     * @param ApiPhoneNumbers $apiPhoneNumbers
     * @return ApiPhoneNumbers
     */
    public function toStorage (ApiPhoneNumbers $apiPhoneNumbers)
    {
        return (new ApiPhoneNumbers())
            ->setId($apiPhoneNumbers->getId())
            ->setPhoneNumbers($apiPhoneNumbers->getPhoneNumbers())
            ;
    }


}
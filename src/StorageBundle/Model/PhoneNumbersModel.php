<?php
/**
 * Created by PhpStorm.
 * User: rmendes
 * Date: 22/12/2018
 * Time: 12:27
 */

namespace App\StorageBundle\Model;

use App\StorageBundle\Repository\PhoneNumbersRepository;
use App\StorageBundle\Transformer\PhoneNumbersTransformer;
use App\ApiBundle\Entity\PhoneNumbers as ApiPhoneNumbers;

class PhoneNumbersModel
{
    /**
     * @var PhoneNumbersRepository $phoneNumbersRepository
     */
    private $phoneNumbersRepository;

    /**
     * @var PhoneNumbersTransformer $phoneNumbersTransformer
     */
    private $phoneNumbersTransformer;

    public function __construct(
        PhoneNumbersRepository $phoneNumbersRepository,
        PhoneNumbersTransformer $phoneNumbersTransformer
    ) {
        $this->phoneNumbersRepository = $phoneNumbersRepository;
        $this->phoneNumbersTransformer = $phoneNumbersTransformer;
    }

    /**
     * @return ApiPhoneNumbers []
     */
    public function getAllPhoneNumbers()
    {
        return $this->phoneNumbersTransformer->toMultipleApi($this->phoneNumbersRepository->findAll());
    }

}
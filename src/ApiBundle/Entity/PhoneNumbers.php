<?php
/**
 * Created by PhpStorm.
 * User: rmendes
 * Date: 22/12/2018
 * Time: 12:51
 */

namespace App\ApiBundle\Entity;

/**
 * Class PhoneNumbers
 * @package App\ApiBundle\Entity
 */
class PhoneNumbers
{
    /**
     * @var int $id
     */
    private $id;

    /**
     * @var
     */
    private $phoneNumbers;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return PhoneNumbers
     */
    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPhoneNumbers()
    {
        return $this->phoneNumbers;
    }

    /**
     * @param mixed $phoneNumbers
     * @return PhoneNumbers
     */
    public function setPhoneNumbers($phoneNumbers)
    {
        $this->phoneNumbers = $phoneNumbers;

        return $this;
    }
}
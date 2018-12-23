<?php
/**
 * Created by PhpStorm.
 * User: rmendes
 * Date: 23/12/2018
 * Time: 17:33
 */

namespace App\Tests;

use App\StorageBundle\Repository\HelperCountryRepository;
use App\StorageBundle\Repository\PhoneNumbersRepository;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

class PhoneNumbersServiceTest extends TestCase
{
    /**
     * @var PhoneNumbersRepository $phoneNumbersRepository
     */
    private $phoneNumbersRepository;

    /**
     * @var HelperCountryRepository $helperCountryRepository
     */
    private $helperCountryRepository;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();

        $kernel = self::bootKernel();

        $this->phoneNumbersRepository = $kernel
            ->getContainer()
            ->get('storage.repository.phoneNumbers');

        $this->helperCountryRepository = $kernel
            ->getContainer()
            ->get('storage.repository.helperCountry');

    }

    public function testApi()
    {
        $client = new \GuzzleHttp\Client([
            'base_url' => 'http://localhost:8000',
            'defaults' => [
                'exceptions' => false
            ]
        ]);

        $response = $client->get('/api/list');
        $this->assertEquals(201, $response->getStatusCode());


    }
}
<?php

namespace Tests\Unit\services;

use App\Parents\Test\ParentUnitTest;
use App\Services\CountryService;
use Psr\Http\Message\StreamInterface;

class CountryServiceTest extends ParentUnitTest
{
    public function test_getCountry_function(): void
    {
        $response = CountryService::new()->getCountry('iran');

        $this->assertIsArray($response);
        $this->assertIsObject($response[0]->name);
        $this->assertSame($response[0]->name->common, 'Iran');

        $this->assertTrue(true);
    }
}

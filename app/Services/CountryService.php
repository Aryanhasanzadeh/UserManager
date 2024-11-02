<?php

namespace App\Services;

use App\Parents\Service\ParentService;
use App\Traits\GuzzleHelper;
use GuzzleHttp\Exception\GuzzleException;

class CountryService extends ParentService
{
    use GuzzleHelper;

    /**
     * @throws GuzzleException
     */
    public function getCountry(string $name): array
    {
        return json_decode(
            $this->getEndpoint(
                config('country-api.base_url') . $name, []
            )
        );
    }

}

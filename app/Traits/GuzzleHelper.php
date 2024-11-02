<?php

namespace App\Traits;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

trait GuzzleHelper
{
    /**
     * @throws GuzzleException
     * @throws Exception
     */
    private function getEndpoint(string $url, array $options = []): string
    {
        $client = new Client();

        $res = $client->get($url, $options);
        if (!$res->getStatusCode())
            throw new Exception();

        return $res->getBody()->getContents();
    }
}

<?php

namespace App\Http\ApiClients;

use GuzzleHttp\Client;
use App\Exceptions\ProductNotFound;
use GuzzleHttp\Exception\ClientException;

class PromoApiClient
{
    private const PRODUCT_ENDPOINT = 'product';

    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /** @throws ProductNotFound */
    public function fetchProductData(string $productId): array
    {
        try {
            $response = $this->client->get($this->buildUrl(self::PRODUCT_ENDPOINT, $productId));

            return json_decode($response->getBody()->getContents(), true);
        } catch (ClientException $e) {
            throw new ProductNotFound($productId);
        }
    }

    private function buildUrl(string $endpoint, string $parameter = ''): string
    {
        return sprintf("%s/%s", $endpoint, $parameter);
    }
}

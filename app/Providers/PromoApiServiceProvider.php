<?php

namespace App\Providers;

use GuzzleHttp\Client;
use App\Http\ApiClients\PromoApiClient;
use Illuminate\Support\ServiceProvider;

class PromoApiServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(PromoApiClient::class, function () {
            return new PromoApiClient(
                new Client([
                    'base_uri' => config('promo_api.url'),
                    'headers' => config('promo_api.headers'),
                ])
            );
        });
    }
}

<?php
namespace App\Clients;

use Illuminate\Support\Facades\Http;

class ExchangeRatesClient
{
    private $apiKey;
    const HOST = 'https://openexchangerates.org/api';

    public function __construct()
    {
        $this->apiKey = config('exchangerates.exchange_rate_api_key');
    }

    public function getLatestRates()
    {
        $path = '/latest.json';
        $response = Http::get(self::HOST.$path, [
        'app_id' => $this->apiKey,
      ]);

        return $response->json();
    }
}

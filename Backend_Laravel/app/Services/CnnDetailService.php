<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class CnnDetailService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = env('RAPIDAPI_KEY');
    }

    public function getDetailBerita()
    {
        try {
            $response = $this->client->request('GET', 'https://indonesia-news.p.rapidapi.com/detail/cnn', [
                'headers' => [
                    'x-rapidapi-key' => $this->apiKey,
                    'x-rapidapi-host' => 'indonesia-news.p.rapidapi.com'
                ],
                'query' => [
                    'url' => 'https://www.cnnindonesia.com/nasional/20231130130057-20-1030995/demo-buruh-di-kota-bekasi-massa-sempat-blokir-jalan-ahmad-yani'
                ],
                'verify' => false
            ]);

            return json_decode($response->getBody()->getContents(), true);
        } catch (RequestException $e) {
            return ['error' => $e->getMessage()];
        }
    }
}

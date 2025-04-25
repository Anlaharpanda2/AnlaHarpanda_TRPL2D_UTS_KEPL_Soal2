<?php
namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class VivaDetailService
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
            // Guzzle request untuk mengambil detail berita dari CNBC
            $response = $this->client->request('GET', 'https://indonesia-news.p.rapidapi.com/detail/cnbc', [
                'headers' => [
                    'x-rapidapi-key' => $this->apiKey, // API Key dari .env
                    'x-rapidapi-host' => 'indonesia-news.p.rapidapi.com',
                ],
                'query' => [
                    'url' => 'https://www.cnbcindonesia.com/news/20240512142508-4-537392/bos-pengusaha-ungkap-biang-keladi-di-balik-tutupnya-pabrik-sepatu-bata' // URL berita
                ],
                'verify' => false // Nonaktifkan verifikasi SSL jika diperlukan
            ]);

            // Mengembalikan response dalam bentuk array
            return json_decode($response->getBody()->getContents(), true);
        } catch (RequestException $e) {
            // Mengembalikan error jika terjadi exception
            return ['error' => $e->getMessage()];
        }
    }
}

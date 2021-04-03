<?php


namespace App\Services;


use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

class HttpService
{
    // Поля класса.
    private Client $client;

    // Конструктор.
    public function __construct()
    {
        $this->client = new Client();
    } // __construct.

    public function request(string $method, string $url = '', array $options = []): ResponseInterface
    {
        return $this->client->request($method, $url, $options);
    } // request.
} // HttpService.
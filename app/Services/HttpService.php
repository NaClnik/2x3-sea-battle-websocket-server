<?php


namespace App\Services;


use GuzzleHttp\Client;

class HttpService
{
    // Поля класса.
    private Client $client;

    // Конструктор.
    public function __construct()
    {
        $this->client = new Client();
    } // __construct.

    public function request(string $method, string $url, array $options)
    {
        $this->client->request($method, $url, $options);
    } // request.
} // HttpService.
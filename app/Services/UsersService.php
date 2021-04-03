<?php


namespace App\Services;


use GuzzleHttp\Client;

class UsersService
{
    // Сервисы класса.
    private UrlService $urlService;

    // Конструктор.
    public function __construct(UrlService $urlService)
    {
        $this->urlService = $urlService;
    } // __construct.

    public function sendUsernameToServer()
    {
        $url = $this->urlService->getServerUrl();

        $client = new Client();
    } // sendUsernameToServer.
} // UsersService.
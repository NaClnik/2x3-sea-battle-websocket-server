<?php


namespace App\Services;


use GuzzleHttp\Client;

class PlayersService
{
    // Сервисы класса.
    private UrlService $urlService;
    private HttpService $http;

    // Конструктор.
    public function __construct(UrlService $urlService, HttpService $http)
    {
        $this->urlService = $urlService;
        $this->http = $http;
    } // __construct.

    public function sendUsernameToServer(string $name)
    {
        $url = $this->urlService->getServerUrl();

        $response = $this->client->request('POST', $url.'/players', [
            'form_params' => [
                'name' => $name
            ] // form_params.
        ]);
    } // sendUsernameToServer.

} // PlayersService.
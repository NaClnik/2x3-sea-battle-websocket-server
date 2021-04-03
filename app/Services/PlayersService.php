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

    // Методы класса.
    public function sendUsernameToServer(string $name)
    {
        $url = $this->urlService->getServerUrl();

        $this->http->request('POST', $url.'/players', [
            'form_params' => [
                'name' => $name
            ] // form_params.
        ]);
    } // sendUsernameToServer.

    public function deletePlayerFromServerById(int $id)
    {
        $url = $this->urlService->getServerUrl();

        $this->http->request('DELETE', $url."/players/$id");
    } // deletePlayerFromServerById.
} // PlayersService.
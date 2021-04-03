<?php


namespace App\Controllers;


use App\Services\PlayersService;
use Core\Base\Abstracts\WebSocketController;

class PlayersController extends WebSocketController
{
    // Сервисы класса.
    private PlayersService $playersService;

    // Конструктор.
    public function __construct(PlayersService $usersService)
    {
        $this->playersService = $usersService;
    } // __construct.

    // Методы класса.
    public function enter()
    {
        $data = $this->webSocketDataBundle->getData();

        $this->playersService->sendUsernameToServer($data['name']);

        $this->getWebSocketDataBundle()->getConnection()->send('ok');
    } // enter.

    public function escape($id)
    {
    } // escape.
} // UserController.
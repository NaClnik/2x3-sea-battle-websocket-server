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
    } // enter.

    public function escape($id)
    {
        $this->playersService->deletePlayerFromServerById($id);
    } // escape.
} // UserController.
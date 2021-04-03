<?php


namespace App\Controllers;


use Core\Base\Abstracts\WebSocketController;

class UsersController extends WebSocketController
{
    // Методы класса.
    public function enter()
    {
        $data = $this->webSocketDataBundle->getData();

        $username = $data['username'];


    } // enter.
} // UserController.
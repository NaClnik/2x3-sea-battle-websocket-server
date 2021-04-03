<?php


namespace App\Controllers;


use Core\Base\Abstracts\WebSocketController;

class TestController extends WebSocketController
{
    public function __construct()
    {
    } // __construct.

    public function index()
    {
        $this->webSocketDataBundle->getConnection()->send($this->webSocketDataBundle->getData());
    } // index.
} // TestController.
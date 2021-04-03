<?php


namespace App\WebSockets;


use Core\Base\Abstracts\WebSocket;
use Core\Bootstrap\WebSocketControllerLoader;
use Core\Bootstrap\WebSocketControllerLoaderBuilder;
use Core\Builders\WebSocketWorkerFactoryBuilder;
use Core\Models\WebSocketDataBundle;
use Core\Wrappers\Base\Interfaces\IWebSocket;

class HomeWebSocket extends WebSocket
{

    public function onConnect($connection)
    {
        echo "New connection\n";
    } // onConnect.

    public function onMessage($connection, $data)
    {
//        var_dump($data);
//        $connection->send('Hello ' . $data);
        $websocketDataBundle = new WebSocketDataBundle($this->worker, $connection, $data);

        $webSocketControllerLoader = new WebSocketControllerLoader($websocketDataBundle);

        $webSocketControllerLoader->run();
    } // onMessage.

    public function onClose($connection)
    {
        echo "Connection closed\n";
    } // onClose.

    public function onError($connection, $code, $msg)
    {
        echo "Error\n";
    } // onError.
} // HomeWebSocket.
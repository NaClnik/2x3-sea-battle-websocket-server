<?php


namespace App\WebSockets;


use Core\Base\Abstracts\WebSocket;
use Core\Bootstrap\WebSocketControllerLoader;
use Core\Models\WebSocketDataBundle;
use Workerman\Connection\TcpConnection;
use Workerman\Worker;

class HomeWebSocket extends WebSocket
{

    public function onConnect($connection)
    {
        echo "New connection\n";
    } // onConnect.

    public function onMessage(TcpConnection $connection, string $data)
    {
//        var_dump($connection);
//        $connection->send('Hello ' . $data);

        echo gettype(json_decode($data));

        // TODO: Проверить JSON на валидность.
        $websocketDataBundle = new WebSocketDataBundle($this->worker, $connection, json_decode($data));

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
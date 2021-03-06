<?php


namespace App\WebSockets;


use Core\Base\Abstracts\WebSocket;
use Core\Bootstrap\WebSocketControllerLoader;
use Core\Models\WebSocketDataBundle;
use Workerman\Connection\TcpConnection;
use Workerman\Worker;

class HomeWebSocket extends WebSocket
{

    public function onConnect(TcpConnection $connection)
    {
        echo "New connection\n";
    } // onConnect.

    public function onMessage(TcpConnection $connection, string $data)
    {
        // TODO: Проверить JSON на валидность.
        $websocketDataBundle = new WebSocketDataBundle($this->worker, $connection, json_decode($data, true));

        // TODO: Возможно стоит переименовать WebSocketControllerLoader в WebSocketRouterLoader.
        $webSocketControllerLoader = new WebSocketControllerLoader($websocketDataBundle);

        $webSocketControllerLoader->run();
    } // onMessage.

    public function onClose(TcpConnection $connection)
    {
        echo "Connection closed\n";
    } // onClose.

    public function onError(TcpConnection $connection, $code, $msg)
    {
        foreach ($this->worker->connections as $connection){
            $connection->send(json_encode([
                'route' => 'localstorage/id'
            ]));
        } // foreach.
    } // onError.
} // HomeWebSocket.
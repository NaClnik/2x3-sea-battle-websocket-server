<?php


namespace App\WebSockets;


use Core\Wrappers\Base\Interfaces\IWebSocket;

class HomeWebSocket implements IWebSocket
{

    public function onConnect($connection)
    {
        print_r($connection);
        //echo "New connection\n";
    } // onConnect.

    public function onMessage($connection, $data)
    {
        // Send hello $data
        $connection->send('Hello ' . $data);
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
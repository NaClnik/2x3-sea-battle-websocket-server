<?php


namespace Core\Wrappers\Base\Interfaces;


interface IWebSocket
{
    // Событие, которое возникает при подключении клиента.
    public function onConnect($connection);

    // Событие, которое возникает при получении сообщения от клиента.
    public function onMessage($connection, $data);

    // Событие, которое возникает при закрытии подключения с клиентом.
    public function onClose($connection);

    // Событие, которое возникает при ошибке.
    public function onError($connection, $code, $msg);
} // IWebSocket.
<?php


namespace Core\Base\Abstracts;


use Workerman\Connection\TcpConnection;
use Workerman\Worker;

abstract class WebSocketController
{
    // Поля класса.
    protected Worker $worker;            // Экземпляр воркера для просмотра подключений.
    protected TcpConnection $connection; // Текущее подключение.
    protected array $data;               // Данные от клиента.


} // WebSocketController.
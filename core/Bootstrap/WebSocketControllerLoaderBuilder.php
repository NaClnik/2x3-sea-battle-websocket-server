<?php


namespace Core\Bootstrap;


use Workerman\Connection\TcpConnection;
use Workerman\Worker;

class WebSocketControllerLoaderBuilder
{
    // Поля класса.
    protected Worker $worker;            // Экземпляр воркера для просмотра подключений.
    protected TcpConnection $connection; // Текущее подключение.
    protected array $data;               // Данные от клиента.

    // Конструктор.
} // WebSocketControllerLoaderBuilder.
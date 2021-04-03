<?php


namespace Core\Base\Abstracts;


use Workerman\Connection\TcpConnection;
use Workerman\Worker;

abstract class WebSocket
{
    // Поля класса.
    protected Worker $worker; // Воркер для просмотра подключений.

    // Абстрактные методы класса.
    // Событие, которое возникает при подключении клиента.
    public abstract function onConnect($connection);

    // Событие, которое возникает при получении сообщения от клиента.
    public abstract function onMessage(TcpConnection $connection, string $data);

    // Событие, которое возникает при закрытии подключения с клиентом.
    public abstract function onClose($connection);

    // Событие, которое возникает при ошибке.
    public abstract function onError($connection, $code, $msg);

    #region Аксессоры и мутаторы класса
    // Аксессоры и мутаторы класса.
    /**
     * @return Worker
     */
    public function getWorker(): Worker
    {
        return $this->worker;
    }

    /**
     * @param Worker $worker
     */
    public function setWorker(Worker $worker): void
    {
        $this->worker = $worker;
    }
    #endregion
} // WebSocket.
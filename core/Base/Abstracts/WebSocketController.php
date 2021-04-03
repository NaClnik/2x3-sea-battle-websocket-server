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

    /**
     * @return TcpConnection
     */
    public function getConnection(): TcpConnection
    {
        return $this->connection;
    }

    /**
     * @param TcpConnection $connection
     */
    public function setConnection(TcpConnection $connection): void
    {
        $this->connection = $connection;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param array $data
     */
    public function setData(array $data): void
    {
        $this->data = $data;
    }
    #endregion

} // WebSocketController.
<?php


namespace Core\Models;


use Workerman\Connection\TcpConnection;
use Workerman\Worker;

class WebSocketDataBundle
{
    // Поля класса.
    protected Worker $worker;            // Экземпляр воркера для просмотра подключений.
    protected TcpConnection $connection; // Текущее подключение.
    protected array $data;               // Данные от клиента.

    // Конструктор.
    public function __construct(Worker $worker, TcpConnection $connection, array $data)
    {
        $this->worker = $worker;
        $this->connection = $connection;
        $this->data = $data;
    } // __construct.


    #region Мутаторы и аксессоры класса
    // Мутаторы и аксессоры класса.
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

} // WebSocketDataBundle.
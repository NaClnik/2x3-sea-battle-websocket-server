<?php


namespace Core\Factories;


use Core\Base\Abstracts\WebSocket;
use Core\Wrappers\Base\Interfaces\IWebSocket;
use Workerman\Worker;

class WebSocketWorkerFactory
{
    // Поля класса.
    private int $numberOfProcesses;        // Количество процессов.
    private WebSocket $webSocketStrategy;  // Стратегия для создания воркера.
    private string $socketName;            // Имя вебСокета для подключения клиента.

    // Конструктор.
    public function __construct()
    {
        $this->numberOfProcesses = 1;
        $this->socketName = 'websocket://127.0.0.1:8899';
    } // __construct.

    #region Аксессоры и мутаторы класса
    // Аксессоры и мутаторы класса.
    /**
     * @return int
     */
    public function getNumberOfProcesses(): int
    {
        return $this->numberOfProcesses;
    }

    /**
     * @param int $numberOfProcesses
     */
    public function setNumberOfProcesses(int $numberOfProcesses): void
    {
        $this->numberOfProcesses = $numberOfProcesses;
    }

    /**
     * @return WebSocket
     */
    public function getWebSocketStrategy(): WebSocket
    {
        return $this->webSocketStrategy;
    }

    /**
     * @param WebSocket $webSocketStrategy
     */
    public function setWebSocketStrategy(WebSocket $webSocketStrategy): void
    {
        $this->webSocketStrategy = $webSocketStrategy;
    }

    /**
     * @return string
     */
    public function getSocketName(): string
    {
        return $this->socketName;
    }

    /**
     * @param string $socketName
     */
    public function setSocketName(string $socketName): void
    {
        $this->socketName = $socketName;
    }
    #endregion

    // Методы класса.
    public function create(): Worker
    {
        // Создаём экземпляр воркера.
        $worker = new Worker($this->socketName);

        // Задаём количество процессов.
        $worker->count = $this->numberOfProcesses;

        // Назначаем обработчики событий.
        // TODO: Переделать: получить ссылку на функцию из экземпляра класса.
        $worker->onConnect = function ($connection){ $this->webSocketStrategy->onConnect($connection);};
        $worker->onMessage = function ($connection, $data){$this->webSocketStrategy->onMessage($connection, $data);};
        $worker->onClose = function ($connection){$this->webSocketStrategy->onClose($connection);};
        $worker->onError = function ($connection, $code, $msg){$this->webSocketStrategy->onError($connection, $code, $msg);};

        $this->webSocketStrategy->setWorker($worker);

        // Возвращаем воркера.
        return $worker;
    } // create.
} // WebSocketWorkerFactory.
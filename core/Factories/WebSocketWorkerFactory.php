<?php


namespace Core\Factories;


use Core\Wrappers\Base\Interfaces\IWebSocket;
use Workerman\Worker;

class WebSocketWorkerFactory
{
    // Поля класса.
    private int $numberOfProcesses;        // Количество процессов.
    private IWebSocket $webSocketStrategy; // Стратегия для создания воркера.
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
     * @return IWebSocket
     */
    public function getWebSocketStrategy(): IWebSocket
    {
        return $this->webSocketStrategy;
    }

    /**
     * @param IWebSocket $webSocketStrategy
     */
    public function setWebSocketStrategy(IWebSocket $webSocketStrategy): void
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
    public function create()
    {
        $worker = new Worker();
    } // create.
} // WebSocketWorkerFactory.
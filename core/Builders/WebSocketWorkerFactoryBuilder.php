<?php


namespace Core\Builders;

// Строитель для WebSocketWorkerFactory в паттерне FluentBuilder.
use Core\Factories\WebSocketWorkerFactory;
use Core\Wrappers\Base\Interfaces\IWebSocket;

class WebSocketWorkerFactoryBuilder
{
    // Поля класса.
    private WebSocketWorkerFactory $webSocketWorkerFactory;

    // Приватный конструктор.
    public function __construct() {
        $this->webSocketWorkerFactory = new WebSocketWorkerFactory();
    } // __construct.

    // Статический метод для создания экземпляра класса.
    public static function make(): self
    {
        return new self();
    } // make.

    // Методы класса.
    public function setNumberOfProcesses(int $numberOfProcesses): self
    {
        $this->webSocketWorkerFactory->setNumberOfProcesses($numberOfProcesses);
        return $this;
    } // setNumberOfProcesses.

    public function setWebSocketStrategy(IWebSocket $webSocketStrategy): self
    {
        $this->webSocketWorkerFactory->setWebSocketStrategy($webSocketStrategy);
        return $this;
    } // setWebSocketStrategy.

    public function build(): WebSocketWorkerFactory
    {
        return $this->webSocketWorkerFactory;
    } // build.
} // WebSocketWorkerFactoryBuilder.
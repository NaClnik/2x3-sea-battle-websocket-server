<?php


namespace Core\Builders;

// Строитель для WebSocketWorkerFactory в паттерне FluentBuilder.
use Core\Base\Abstracts\WebSocket;
use Core\Factories\WebSocketWorkerFactory;

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

    public function setWebSocketStrategy(WebSocket $webSocketStrategy): self
    {
        $this->webSocketWorkerFactory->setWebSocketStrategy($webSocketStrategy);
        return $this;
    } // setWebSocketStrategy.

    public function setSocketName(string $socketName): self
    {
        $this->webSocketWorkerFactory->setSocketName($socketName);
        return $this;
    } // setSocketName.

    public function build(): WebSocketWorkerFactory
    {
        return $this->webSocketWorkerFactory;
    } // build.
} // WebSocketWorkerFactoryBuilder.
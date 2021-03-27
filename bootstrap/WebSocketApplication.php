<?php

namespace Bootstrap;

use App\WebSockets\HomeWebSocket;
use Core\Builders\WebSocketWorkerFactoryBuilder;
use Workerman\Worker;

class WebSocketApplication
{
    public function run(): void
    {
        // Создаём экземпляр фабрики при помощи FluentBuilder'а.
        $webSocketWorkerFactory =
            WebSocketWorkerFactoryBuilder::make()
            ->setSocketName('websocket://127.0.0.1:8899')
            ->setNumberOfProcesses(4)
            ->setWebSocketStrategy(new HomeWebSocket())
            ->build();

        // Создаём воркера при помощи фабрики.
        $worker = $webSocketWorkerFactory->create();

        // Запускаем всех воркеров.
        Worker::runAll();
    } // run.
} // WebSocketApplication.
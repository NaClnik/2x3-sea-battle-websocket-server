<?php

namespace Bootstrap;

use App\WebSockets\HomeWebSocket;
use Core\Builders\WebSocketWorkerFactoryBuilder;
use Workerman\Worker;

class WebSocketApplication
{
    public function run(): void
    {
        $webSocketWorkerFactory =
            WebSocketWorkerFactoryBuilder::make()
            ->setSocketName('websocket://127.0.0.1:8899')
            ->setNumberOfProcesses(4)
            ->setWebSocketStrategy(new HomeWebSocket())
            ->build();

        $worker = $webSocketWorkerFactory->create();

        Worker::runAll();
    } // run.
} // WebSocketApplication.
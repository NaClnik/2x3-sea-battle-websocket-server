# 2x3-sea-battle-websocket-server

## Examples of using the wrapper around the Workerman
To create a new instance of `Worker`, you must create a new class that implements the `IWebSocket` interface. 
Then you must create an instance of the `WebSocketWorkerFactoryBuilder` class using a static
using the `make()` method, and then pass the necessary parameters to the builder using the **Fluent API**.
Then, on the resulting factory instance, you must call the `create()` method and call the static `runAll()`
method on the `Worker` class

For example:
```php
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
```

## Example of using routing and controllers in the `onMessage` event

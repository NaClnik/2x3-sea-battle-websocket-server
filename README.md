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
In order to implement a routing system using controllers
with dependency injection, the routing code from my framework
was modified: __[Aliciesy Framework](https://github.com/NaClnik/Aliciesy)__ for __WebSockets__.

### Define routes example
Go to `app/Routes/WebSocketRouteDefiner.php` and define your routes in `getRoutes()` method:
```php
<?php


namespace App\Routes;


use App\Controllers\TestController;
use Core\Base\Abstracts\RouteDefiner;
use Core\Routing\RoutesCollection;

class WebSocketRouteDefiner extends RouteDefiner
{
    public function getRoutes(): RoutesCollection
    {
        $this->routesCollection->define('okay/man', TestController::class, 'index');

        $this->routesCollection->define('okay/second/{id}', TestController::class, 'second');

        $this->routesCollection->define('okay/service', TestController::class, 'service');

        return $this->routesCollection;
    } // getRoutes.
} // WebSocketRouteDefiner.
```

### Controllers example
In order to send responses to the client, you must create
a controller class and extend the abstract `WebSocketController` class.

For convenience, place your controllers along this path: `app/Controllers/`

```php
<?php


namespace App\Controllers;


use App\Services\Test\TestService;
use Core\Base\Abstracts\WebSocketController;

class TestController extends WebSocketController
{
    private TestService $testService;

    public function __construct(TestService $testService)
    {
        $this->testService = $testService;
    } // __construct.

    public function index()
    {
        $this->webSocketDataBundle->getConnection()->send(json_encode($this->webSocketDataBundle->getData()));
    } // index.

    public function second($id)
    {
        $this->webSocketDataBundle->getConnection()->send($id);
    } // index2.

    public function service()
    {
        $this->webSocketDataBundle->getConnection()->send($this->testService->getData());
    } // service.
} // TestController.
```
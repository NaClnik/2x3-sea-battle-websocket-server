<?php


namespace Core\Bootstrap;


use App\Routes\WebSocketRouteDefiner;
use Core\Defaults\DefaultUriMatchValidator;
use Core\Models\WebSocketDataBundle;
use Core\Routing\RouterBuilder;
use Workerman\Connection\TcpConnection;
use Workerman\Worker;

class WebSocketControllerLoader
{
    // Поля класса.
    protected WebSocketDataBundle $webSocketDataBundle;

    // Конструктор.
    public function __construct(WebSocketDataBundle $websocketDataBundle)
    {
        $this->webSocketDataBundle = $websocketDataBundle;
    } // __construct.

    #region Аксессоры и мутаторы класса
    // Аксессоры и мутаторы класса.
    /**
     * @return WebSocketDataBundle
     */
    public function getWebSocketDataBundle(): WebSocketDataBundle
    {
        return $this->webSocketDataBundle;
    }

    /**
     * @param WebSocketDataBundle $webSocketDataBundle
     */
    public function setWebSocketDataBundle(WebSocketDataBundle $webSocketDataBundle): void
    {
        $this->webSocketDataBundle = $webSocketDataBundle;
    }
    #endregion

    // Методы класса.
    public function run(): void
    {
        $router =
            RouterBuilder::make()
            ->setRoutesCollection(new WebSocketRouteDefiner())
            ->setUriMatchValidator(new DefaultUriMatchValidator())
            ->setWebSocketDataBundle($this->webSocketDataBundle)
            ->build();

        $router->executeRoute();
    } // run.
} // WebSocketControllerLoader.
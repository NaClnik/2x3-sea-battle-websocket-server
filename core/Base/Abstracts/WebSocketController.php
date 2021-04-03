<?php


namespace Core\Base\Abstracts;


use Core\Models\WebSocketDataBundle;
use Workerman\Connection\TcpConnection;
use Workerman\Worker;

abstract class WebSocketController
{
    // Поля класса.
    protected WebSocketDataBundle $webSocketDataBundle;

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

} // WebSocketController.
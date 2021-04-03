<?php


namespace Core\Routing;




// Строитель для Router (Паттерн FluentBuilder).
use Core\Base\Abstracts\RouteDefiner;
use Core\Base\Interfaces\IUriMatchValidator;
use Core\Models\Route;
use Core\Models\WebSocketDataBundle;

class RouterBuilder
{
    // Поля класса.
    private Router $router;

    // Конструктор.
    public function __construct()
    {
        $this->router = new Router();
    } // __construct.

    // Статический метод, который создаёт экземпляр объекта.
    public static function make()
    {
        return new self();
    } // make.

    // Методы класса.
    public function setRoutesCollection(RouteDefiner $routeDefiner): self
    {
        $this->router->setRoutesCollection($routeDefiner->getRoutes());
        return $this;
    } // setRoutesCollection.

    public function setUriMatchValidator(IUriMatchValidator $uriMatchValidator): self
    {
        $this->router->setUriMatchValidator($uriMatchValidator);
        return $this;
    } // setUriMatchValidator.

    public function setWebSocketDataBundle(WebSocketDataBundle $webSocketDataBundle)
    {
        $this->router->setWebSocketDataBundle($webSocketDataBundle);
        return $this;
    } // setWebSocketDataBundle.

    public function build(): Router
    {
        return $this->router;
    } // build.
} // RouterBuilder.
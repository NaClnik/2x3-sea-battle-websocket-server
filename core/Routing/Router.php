<?php

namespace Core\Routing;

use Core\Base\Interfaces\IUriMatchValidator;
use Core\Defaults\DefaultUriMatchValidator;
use Core\Exceptions\RouteNotFoundException;
use Core\Models\Route;
use Core\Models\RouteWithController;
use Core\Models\WebSocketDataBundle;
use Core\Reflection\ReflectionHandler;

class Router
{
    // Поля класса.
    private RoutesCollection $routesCollection;
    private IUriMatchValidator $uriMatchValidator;
    private WebSocketDataBundle $webSocketDataBundle;

    // Конструктор.
    public function __construct()
    {
        $this->routesCollection = new RoutesCollection();
        $this->uriMatchValidator = new DefaultUriMatchValidator();
    } // __construct.

    #region Аксессоры класса
    // Аксессоры и мутаторы класса.
    /**
     * @return RoutesCollection
     */
    public function getRoutesCollection(): RoutesCollection
    {
        return $this->routesCollection;
    }

    /**
     * @param RoutesCollection $routesCollection
     */
    public function setRoutesCollection(RoutesCollection $routesCollection): void
    {
        $this->routesCollection = $routesCollection;
    }

    /**
     * @return IUriMatchValidator
     */
    public function getUriMatchValidator(): IUriMatchValidator
    {
        return $this->uriMatchValidator;
    }

    /**
     * @param IUriMatchValidator $uriMatchValidator
     */
    public function setUriMatchValidator(IUriMatchValidator $uriMatchValidator): void
    {
        $this->uriMatchValidator = $uriMatchValidator;
    }

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
    // Метод для исполнения метода контроллера, к которому привязан маршрут.
    public function executeRoute()
    {
        // Получить совпадающий маршрут.
        $matchedRoute = $this->getMatchedRoute();

        // Создать хэндлер для рефлексии.
        $reflectionHandler = new ReflectionHandler();

        // Получить данные из метода контроллера, связанного с маршрутом.
        return $reflectionHandler->getDataFromController(
            $matchedRoute->getControllerName(),
            $matchedRoute->getActionName(),
            $this->webSocketDataBundle->getData()['route'],
            $matchedRoute->getRoute(),
            $this->webSocketDataBundle
        );
    } // executeRoute.

    // Получить маршрут, который совпадает с определённым маршрутом в ApiRouteDefiner.
    private function getMatchedRoute(): RouteWithController
    {
        // Получить все роуты, определённые в ApiRouteDefiner.
        $routesCollection = $this->routesCollection->getRoutes();

        // Получить массив с совпадающими маршрутами.
        $data = array_filter($routesCollection, function (Route $route){
            return $this->uriMatchValidator->match(new Route($this->webSocketDataBundle->getData()['route']), $route);
        });

        // TODO: Протестить
        $foundRoute = array_values($data)[0];

//        if (!array_values($data)[0]){
//            throw new RouteNotFoundException();
//        } // if.
//
//        // Вернуть первый элемент из массива.
//        return array_values($data)[0];

        if(!$foundRoute){
            throw new RouteNotFoundException();
        } // if.

        return $foundRoute;
    } // getMatchedRoute.
} // Router.
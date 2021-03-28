<?php


namespace Core\Routing;


use Core\Models\RouteWithController;

// TODO: Переместить класс в папку core/Collections и изменить namespace на Core\Collections.
// TODO: Возможно не стоит перемещать...
// Класс для определения маршрутов приложения.
class RoutesCollection
{
    // Поля класса.
    private array $routes;

    // Конструктор.
    public function __construct()
    {
        $this->routes = [];
    } // __construct.

    // Аксессоры класса.
    /**
     * @return array
     */
    public function getRoutes(): array
    {
        return $this->routes;
    } // getRoutes.

    // Методы класса
    public function create(string $route, string $method, string $controllerName, string $actionName)
    {
        array_push($this->routes, new RouteWithController($route, strtoupper($method), $controllerName, $actionName));
    } // create.

    // TODO: Сократить код.
    public function get(string $route, string $controllerName, string $actionName)
    {
        $this->create($route, 'GET', $controllerName, $actionName);
    } // get.

    public function post(string $route, string $controllerName, string $actionName)
    {
        $this->create($route, 'POST', $controllerName, $actionName);
    } // get.

    public function put(string $route, string $controllerName, string $actionName)
    {
        $this->create($route, 'PUT', $controllerName, $actionName);
    } // put.

    public function delete(string $route, string $controllerName, string $actionName)
    {
        $this->create($route, 'DELETE', $controllerName, $actionName);
    } // delete.
} // RoutesCollection.
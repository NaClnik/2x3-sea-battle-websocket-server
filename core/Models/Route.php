<?php


namespace Core\Models;


class Route
{
    // Поля класса.
    protected string $route;

    // Конструктор.
    public function __construct(string $route)
    {
        $this->route = $route;
    } // __construct.

    #region Аксессоры класса
    // Аксессоры класса.
    /**
     * @return string
     */
    public function getRoute(): string
    {
        return $this->route;
    }

    /**
     * @param string $route
     */
    public function setRoute(string $route): void
    {
        $this->route = $route;
    }
    #endregion
} // Route.
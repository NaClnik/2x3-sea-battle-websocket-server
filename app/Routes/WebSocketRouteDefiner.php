<?php


namespace App\Routes;


use App\Controllers\ErrorsController;
use App\Controllers\PlayersController;
use Core\Base\Abstracts\RouteDefiner;
use Core\Routing\RoutesCollection;

class WebSocketRouteDefiner extends RouteDefiner
{
    public function getRoutes(): RoutesCollection
    {
        // Определение маршрутов для контроллера PlayersController.
        $this->routesCollection->define('players/enter', PlayersController::class, 'enter');
        $this->routesCollection->define('players/escape/{id}', PlayersController::class, 'escape');

        // Определение маршрутов для контроллера ErrorsController.
        $this->routesCollection->define('errors/removeEscapedPlayers', ErrorsController::class, 'error');

        return $this->routesCollection;
    } // getRoutes.
} // WebSocketRouteDefiner.
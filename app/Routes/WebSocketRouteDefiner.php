<?php


namespace App\Routes;


use App\Controllers\PlayersController;
use Core\Base\Abstracts\RouteDefiner;
use Core\Routing\RoutesCollection;

class WebSocketRouteDefiner extends RouteDefiner
{
    public function getRoutes(): RoutesCollection
    {
        $this->routesCollection->define('users/enter', PlayersController::class, 'enter');

        return $this->routesCollection;
    } // getRoutes.
} // WebSocketRouteDefiner.
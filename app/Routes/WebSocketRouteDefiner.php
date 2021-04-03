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
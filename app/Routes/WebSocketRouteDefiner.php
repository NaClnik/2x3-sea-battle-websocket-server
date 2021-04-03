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

        return $this->routesCollection;
    } // getRoutes.
} // WebSocketRouteDefiner.
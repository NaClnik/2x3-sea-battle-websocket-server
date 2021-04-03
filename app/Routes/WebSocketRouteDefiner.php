<?php


namespace App\Routes;


use Core\Base\Abstracts\RouteDefiner;
use Core\Routing\RoutesCollection;

class WebSocketRouteDefiner extends RouteDefiner
{

    public function getRoutes(): RoutesCollection
    {
        return $this->routesCollection;
    } // getRoutes.
} // WebSocketRouteDefiner.
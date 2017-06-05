<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::plugin(
    'Cms',
    ['path' => '/cms'],
    function (RouteBuilder $routes) {
        $routes->fallbacks(DashedRoute::class);
    }
);

Router::prefix('admin', function ($routes) {
    $routes->plugin('Cms', function ($routes) {
        $routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'DashedRoute']);
        $routes->connect('/:controller/:action/*', [], ['routeClass' => 'DashedRoute']);
    });
});

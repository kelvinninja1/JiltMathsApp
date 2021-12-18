<?php

include_once 'src/router/Request.php';
include_once 'src/router/Router.php';
$router = new Router(new Request);

$router->get('/', function() {
    return include 'src/pages/index.php';
});

$router->get('/mcq/primary/1', function($request) {
    return <<<HTML
  <h1>Profile</h1>
HTML;
});
$router->get('/mcq/primary/2', function($request) {
    return <<<HTML
  <h1>Profile</h1>
HTML;
});
$router->get('/mcq/primary/3', function($request) {
    return <<<HTML
  <h1>Profile</h1>
HTML;
});
$router->get('/mcq/primary/4', function($request) {
    return <<<HTML
  <h1>Profile</h1>
HTML;
});
$router->get('/mcq/primary/5', function($request) {
    return <<<HTML
  <h1>Profile</h1>
HTML;
});
$router->get('/mcq/primary/6', function($request) {
    return <<<HTML
  <h1>Profile</h1>
HTML;
});

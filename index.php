<?php

require __DIR__ . '/vendor/functions.php';

// require __DIR__ . '/vendor/exceptions/NotAllowedException.php';
// require __DIR__ . '/vendor/exceptions/NotFoundException.php';
require __DIR__ . '/vendor/exceptions.php';

require __DIR__ . '/vendor/Config.php';
require __DIR__ . '/vendor/Router.php';

try {
    $router = new Router;
    $router->handleRequest();
} catch (NotAllowedException $e) {
    // include Config::DOSSIER_VIEWS . '/errors/403.html.php';
} catch (NotFoundException $e) {
    // include Config::DOSSIER_VIEWS . '/errors/404.html.php';
} catch (Exception $e) {
    // include Config::DOSSIER_VIEWS . '/errors/generique.html.php';
}

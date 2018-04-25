<?php
defined("DOCROOT") or die ("NO DIRECT ACCESS");
include CLASS_PATH . "Config.php";
include CLASS_PATH . "Router.php";
include CLASS_PATH . "View.php";
include CLASS_PATH . "Model.php";
include CLASS_PATH . "Entity.php";
include CLASS_PATH . "AutoLoader.php";
session_start();
spl_autoload_register("Autoloader::load");
$router = Router::getInstance();

$router->addRoute(new Route("",
    [
        "controller" => "home",
        "action" => "home"
    ]));

$router->addRoute(new Route("/get/{id}",
    [
        "controller" => "main",
        "action" => "get"
    ]));

$router->addRoute(new Route("/getAll",
    [
        "controller" => "main",
        "action" => "getAll"
    ]));


$router->addRoute(new Route("/remove/{id}",
    [
        "controller" => "main",
        "action" => "remove"
    ]));

$router->addRoute(new Route("/add",
    [
        "controller" => "main",
        "action" => "add"
    ]));

try {
    $router->run();
} catch (RouterException $exception) {
    $router->redirect404();
    echo $exception->getMessage();
};

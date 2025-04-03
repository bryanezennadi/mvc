<?php

$url = $_SERVER['REQUEST_URI']; // richiesta url con URI
$method = $_SERVER['REQUEST_METHOD'] ?? 'GET'; // richiesta metodo

//echo $url; // /uda5F/mvc5F/index.php
//echo "<br>";
//echo $method; // GET

$url = trim(str_replace('mvc5F/', '', $url), '/');
//echo "<br>";
//echo $url; // /uda5F/index.php

//echo '<br>';
//echo ' ciao sono index.php';

#router: versione 1
$routes=[
    'GET'=> [
        'home/index'=> ["controller"=>"HomeController", "action"=>"presentation1"],
        'home/products'=> ["controller"=>"ProductController", "action"=>"show1"],
        'home/services'=> ["controller"=>"ServiceController", "action"=>"presentation2"],
        'home/paperino'=> ["controller"=>"PaperinoController", "action"=>"ciao"]
    ],
    'POST'=>[
        'home/index'=> ["controller"=>"HomeController", "action"=>"presentation1"],
        'home/products'=> ["controller"=>"ProductController", "action"=>"show1"],
        'home/services'=> ["controller"=>"ServiceController", "action"=>"presentation2"],
        'home/paperino'=> ["controller"=>"PaperinoController", "action"=>"ciao"]
    ]
];

if(!isset($routes[$method])){
    http_response_code(405);
    die('metodo non supportato');
}

if (!array_key_exists($url, $routes[$method]))
{
    http_response_code(404);
    die('pagina non trovata');
}

$controller=$routes[$method] [$url]['controller'];
echo $controller;

echo '<br>';

$action=$routes[$method] [$url]['action'];
echo $action;

require $controller. ".php";
$controllerObj= new $controller();
$controllerObj-> $action();

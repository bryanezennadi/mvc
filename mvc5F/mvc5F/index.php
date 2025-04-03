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
/*$routes=[
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
];*/
require 'router.php';
$routerClass = new router();
$routerClass -> addController('GET', 'home/index','HomeController', 'presentation1');
$routerClass -> addController('GET', 'home/products','ProductController', 'show1');
$routerClass -> addController('GET', 'home/services','ServiceController', 'presentation2');
$routerClass -> addController('GET', 'home/paperino','Paperino', 'ciao');
$routerClass -> addController('POST', 'home/index','HomeController', 'presentation11');
$routerClass -> addController('POST', 'home/products','ProductController', 'show11');
$routerClass -> addController('POST', 'home/services','ServiceController', 'presentation22');

$reValue=$routerClass->match($url,$method);


if (empty($reValue))
{
    http_response_code(404);
    die('pagina non trovata');
}

$controller= $reValue['controller'];

//echo $controller;

echo '<br>';

$action=$reValue['action'];
//echo $action;

require $controller. ".php";
$controllerObj= new $controller();
$controllerObj-> $action();

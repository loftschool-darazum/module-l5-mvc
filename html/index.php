<?php
require '../vendor/autoload.php';
require '../base/config.php';

$route = new \Base\Route();
$route->add('/login', \App\Controller\Login::class);
$route->add('/login/auth', \App\Controller\Login::class, 'auth');
$route->add('/blog', \App\Controller\Blog::class);

$app = new \Base\Application($route);
$app->run();
<?php
require "./../core/Application.php";
// include "./../filedownloads.php";
use app\core\Application;
$app = new Application();
$app->router->get("/", "home");
$app->router->get('/India/dailyrecords', "dailyrecords");
$app->router->get("/India/state", "statewise");
$app->router->get("/India/state/karnataka", "KA");
$app->router->get("/India/state/Tamilnadu", "TN");
$app->router->get("/India/state/Maharashtra", "MH");
// $app->router->get("/India/statewise/karnataka", "statewise");
$app->run();

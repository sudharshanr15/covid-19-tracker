<?php
require "./../core/Application.php";
// if the result of cases was not correct, then try to uncomment the below code reload the page and comment it again.
// include "./../filedownloads.php";
use app\core\Application;
$app = new Application();
$app->router->get("/", "home");
$app->router->get('/India/dailyrecords', "dailyrecords");
$app->router->get("/India/state/karnataka", "KA");
$app->router->get("/India/state/Tamilnadu", "TN");
$app->router->get("/India/state/Maharashtra", "MH");
$app->run();

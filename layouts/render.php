<?php
function renderOnlyView($view){
    ob_start();
    include_once __DIR__ . "\\..\\routefiles\\$view.php";
    return ob_get_clean();
}

function renderLayout(){
    ob_start();
    include __DIR__ . "./main.php";
    return ob_get_clean();
}

function renderView($callback){
    $view = renderOnlyView($callback);
    $layout = renderLayout();
    return str_replace("{{content}}", $view, $layout);
}

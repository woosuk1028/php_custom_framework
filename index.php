<?php
    define('BASEPATH', $_SERVER[ "HTTP_HOST" ]);

    require_once "./config/config.php";
    require_once "./system/database.php";

    $request_uri = $_SERVER['REQUEST_URI'];

    // '/' URI explode
    $segments = explode('/', trim($request_uri, '/'));

    // controller setting
    $controller = isset($segments[$app['DEFAULT_URI_INDEX']]) ? $segments[$app['DEFAULT_URI_INDEX']] : 'default_controller';
    $method = isset($segments[$app['DEFAULT_URI_INDEX']+1]) ? $segments[$app['DEFAULT_URI_INDEX']+1] : 'default_method';

    $controller = ucfirst($controller);
    $controller_url = "controllers/$controller.php";
    if(file_exists($controller_url))
    {
        require_once $controller_url;
        $productsController = new $controller();
    }
    else
    {
        echo "invalid url";
    }


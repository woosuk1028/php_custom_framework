<?php
    define('BASEPATH', $_SERVER[ "HTTP_HOST" ]);

    require_once dirname(__FILE__)."/system/Function.php";
    require_once dirname(__FILE__)."/config/config.php";
    require_once dirname(__FILE__)."/system/Database.php";
    require_once dirname(__FILE__)."/system/Load.php";


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

        if($method != 'default_method')
            $productsController->$method();
        else
            $productsController->index();

    }
    else
    {
        echo "invalid url";
    }


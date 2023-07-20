<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    $database['default'] = array(
        'DB_HOST'   =>  env('DB_HOST'),
        'DB_ID'     =>  env('DB_ID'),
        'DB_PASS'   =>  env('DB_PASS'),
        'DB_NAME'   =>  env('DB_NAME')
    );

    $app['DEFAULT_URI_INDEX'] = 1;
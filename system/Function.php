<?php

    function env($key)
    {
        $env = array();
        $env = parse_ini_file(dirname(__FILE__).'/../.env', TRUE);

        return $env[$key];
    }
<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class database{
        private $m_conn = null;

        public function __construct($host = null, $user = null, $pass = null, $dbName = null, $persist = false)
        {
            global $app;
            if($host)
            {
                $this->connect($app['DB_HOST'], $app['DB_ID'], $app['DB_PASS'], $app['DB_NAME'], $persist);
            }
        }
    }

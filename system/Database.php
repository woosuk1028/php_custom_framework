<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Database
    {
        private $connect = null;

        public function __construct($db='default')
        {
            global $app, $database;

            $this->connect($database[$db]['DB_HOST'], $database[$db]['DB_ID'], $database[$db]['DB_PASS'], $database[$db]['DB_NAME']);

        }

        protected function connect($host, $id, $pass, $db)
        {
            $this->connect = mysqli_connect($host, $id, $pass, $db);

            if(!$this->connect)
            {
                die("connect error");
            }

            return true;
        }

        public function query($query)
        {
            $result = mysqli_query($this->connect, $query);

            return $result;
        }

        public function single($result)
        {
            if(!$this->connect)
                return false;

            $result = mysqli_fetch_assoc($result);
            
            return $result;
        }
    }

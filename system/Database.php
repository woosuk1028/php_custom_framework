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
            mysqli_set_charset($this->connect,"utf8");
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

            $res = mysqli_fetch_assoc($result);
            
            return $res;
        }

        public function rows($result)
        {
            if(!$this->connect)
                return false;

            $res = array();

            if(mysqli_num_rows($result)>0)
            {
                $res = mysqli_fetch_array($result);
            }

            return $res;
        }

        public function insert($table, $set)
        {
            $set_qry = "";
            foreach($set as $key => $val)
            {
                if(is_string($val))
                    $val = "'$val'";

                $set_qry.= $key."=".$val.", ";
            }
            $set_qry = substr($set_qry,0,-2);

            $q = " INSERT INTO {$table} SET $set_qry ";
            $res = $this->query($q);

            return $res;
        }
    }

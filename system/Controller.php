<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Controller
    {
        public function __construct()
        {

        }
        
        protected function view($view,$data=[])
        {
            foreach ($data as $key => $value) {
                $$key = $value;
            }

            include_once dirname(__FILE__)."/../view/".$view.".php";
        }

        protected function model($model)
        {
            include_once dirname(__FILE__)."/../model/".$model.".php";

            $this->{$model} = new $model();
        }

        protected function post($param)
        {
            $res = xss_clean($_POST[$param]);

            return $res;
        }

        protected function get($param)
        {
            $res = xss_clean($_GET[$param]);
            return $res;
        }

    }

<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Load
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

    }

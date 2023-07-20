<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Test extends Load
    {
        public function __construct()
        {
            parent::__construct();

            $this->db = new Database();
        }

        public function index()
        {
            $data['test'] = 'test';

            $query = $this->db->query("SELECT test FROM test limit 1");
            $result = $this->db->result($query);
            echo $result['test'];

            $this->view("test", $data);
        }

        public function tost()
        {
            echo "good";
        }

    }
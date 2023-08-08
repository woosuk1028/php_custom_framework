<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class TestModel extends Model
    {
        public function __construct()
        {
            parent::__construct();

            $this->db = new Database();
        }

        private $members = array(
            '1' => 'Edward',
            '2' => 'Alex',
            '3' => 'John'
        );

        public function GetMembers()
        {
            return $this->members;
        }

    }
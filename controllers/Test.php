<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Test extends Controller
    {
        public function __construct()
        {
            parent::__construct();

            $this->db = new Database();
        }

        public function index()
        {
            $data['test'] = 'test';

            $query = $this->db->query("SELECT test FROM test");
//            $result = $this->db->result($query);
            while($row = $this->db->rows($query))
            {
                echo $row['test'];
            }

//            echo $result['test'];
//            $this->view("test", $data);
        }

        public function tost()
        {
            $data['test'] = $this->get('ppost');
            $data['test2'] = 2;

            $result = $this->db->insert("test", $data);
            if($result)
            {
                echo "success";
            }

//            $this->model("TestModel");
//            $members = $this->TestModel->GetMembers();
//            print_r($members);
        }

    }
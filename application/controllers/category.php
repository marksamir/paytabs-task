<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Category extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('categorymodel', 'cat');
    }

    function index()
    {
        echo "Hello";
    }

    function create()
    {
        echo "Hell From Create";
    }

    function fetch_sub_category($parent_id)
    {
        header("Content-Type: application/json");
        if (isset($parent_id)) {
            echo $this->cat->fetch_sub_categories($parent_id);
        }
    }
}

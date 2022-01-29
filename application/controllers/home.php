<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('categorymodel', 'cat');
    }

    function index()
    {
        $data['categories'] = $this->cat->initial_menu();
        $this->load->view('category', $data);
    }

    
  
}

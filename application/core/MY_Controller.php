<?php

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
}

class Admin_Controller extends MY_Controller
{

    public function render_view_template($page = null, $data = array())
    {
        $this->load->view('backend/templates/header', $data);
        $this->load->view('backend/templates/top-menu', $data);
        $this->load->view('backend/templates/main-menu', $data);
        $this->load->view($page, $data);
        $this->load->view('backend/templates/footer', $data);
    }


    public function FunctionName(Type $var = null)
    {
        # code...
    }
}

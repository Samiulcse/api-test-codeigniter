<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gallery extends Admin_Controller
{
    public function __construct()
    {
        parent:: __construct();
    }
    public function index()
    {
        $this->data['page_title'] = "Gallery";

        $this->render_view_template("backend/gallery/index",$this->data);
    }

    public function add(){
        print_r($_FILES);
    }
}

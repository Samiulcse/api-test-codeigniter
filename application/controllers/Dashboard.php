<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->data['page_title'] = 'Dashboard';
    }

    public function index()
    {
        $this->render_view_template('backend/dashboard', $this->data);
    }
}

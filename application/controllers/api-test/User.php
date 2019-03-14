<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('user_model');
        $this->load->helper('api_request');
    }

    public function index()
    {
        $this->data['page_title'] = "All Users";
        $this->render_view_template('backend/user/index', $this->data);
    }

    public function getAllUser()
    {
        $url = 'http://localhost/data-api/v1/api/getAllUsers';
        $method = "GET";
        $response = callAPI($method,$url,null);
        $result = $this->__processData(json_decode($response, true));
        echo $result;
    }

    private function __processData($response)
    {
        $result = [];
        $i = 1;
        foreach ($response as $key => $data) {
            $data['sl'] = $i;
            $data['gender'] = ucfirst($data['gender']);
            $data['action'] = '<a id="view" data-id="' . $data['id'] . '" class="btn btn-sm btn-success">View</a>'
                . '&nbsp;&nbsp;&nbsp;<a id="edit" data-id="' . $data['id'] . '" class="btn btn-sm btn-warning">Edit</a>'
                . '&nbsp;&nbsp;&nbsp;<a id="delete_user" data-id="' . $data['id'] . '" class="btn btn-sm btn-danger">Delete</a>';
            array_push($result, $data);
            $i++;
        }

        return json_encode(["data"=>$result]);
    }

    public function edit()
    {
        $data = $this->input->post();
        $url = "http://localhost/data-api/v1/api/editUser";
        $method = $_SERVER['REQUEST_METHOD'];
        $response = callAPI($method,$url,http_build_query($data));
        echo $response;
    }

    // add user
    public function add()
    {
        $data = $this->input->post();
        $url = "http://localhost/data-api/v1/api/addNewUser";
        $method = $_SERVER['REQUEST_METHOD'];
        $response = callAPI($method,$url,http_build_query($data));
        echo $response;
    }

    // delete
    public function delete()
    {
        $data = $this->input->post();
        $url = 'http://localhost/data-api/v1/api/deleteUser';
        $method = $_SERVER['REQUEST_METHOD'];
        $response = callAPI($method,$url,http_build_query($data));
        echo $response;
    }
    // view
    public function view()
    {
        $id = $this->input->get('id');
        $url = 'http://localhost/data-api/v1/api/getUserById';
        $method = $_SERVER['REQUEST_METHOD'];
        $response = callAPI($method,$url . '?id=' . $id,null);
        echo $response;
    }

    // delete all selected user
    public function deleteAllSelected(){
        $data =$data = $this->input->post();
        $url = 'http://localhost/data-api/v1/api/deleteAllSelected';
        $method = $_SERVER['REQUEST_METHOD'];
        $response = callAPI($method,$url ,http_build_query($data));
        echo $response;
    }

}

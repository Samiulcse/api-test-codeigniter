<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('api_model');

    }

    public function getAllUsers()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {

            $result = $this->api_model->getAllUsers();

            $val = json_encode($result, true);
            
            echo $val;
            // print_r($result);
        }
    }

    public function getUserById()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {

            $id = $this->input->get('id');

            $result = $this->api_model->getUserById($id);

            if ($result) {
                echo json_encode($result);
            } else {

                echo json_encode(["message" => "Not Found"]);
            }
        }
    }

    public function addNewUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $user_data = [
                'name' => $this->input->post('name'),
                'phone' => $this->input->post('phone'),
                'gender' => $this->input->post('gender'),
                'address' => $this->input->post('address'),
            ];

            $result = $this->api_model->addNewUser($user_data);

            if ($result) {
                echo json_encode(['id' => $result]);

            } else {
                echo json_encode(['error' => 'There is problem to add record']);
            }
        }
    }

    public function editUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {

            $data = $this->input->post();
            $id = $this->input->post('id');

            $result = $this->api_model->editUser($id, $data);

            if ($result) {

                echo json_encode(['Message' => "Updated"]);

            } else {
                echo json_encode(['error' => 'There is problem to add record']);
            }

        }
    }

    public function deleteUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {

            $id = $this->input->post('id');

            $result = $this->api_model->deleteUser($id);

            if ($result) {

                echo json_encode(['Message' => "Deleted","status"=>"success"]);

            } else {
                echo json_encode(['error' => 'There is problem to add record']);
            }
        }
    }

}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('user_model');
    }

    public function index()
    {

        $this->data['page_title'] = "All Users";

        $this->render_view_template('backend/user/index', $this->data);
    }

    public function getAllUser()
    {

        $url = 'http://localhost/data-api/v1/api/getAllUsers';

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
        //curl_setopt($ch, CURLOPT_POSTFIELDS,$body);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curl);

        $result = $this->processData(json_decode($response, true));

        echo $result;

        curl_close($curl);
    }

    private function processData($response)
    {
        $result= [];
        $i = 1;
        foreach ($response as $key => $data) {
            $data['sl'] = $i;
            $data['gender'] = ucfirst($data['gender']);
            $data['action'] = '<a id="view" data-id="'.$data['id'].'" class="btn btn-sm btn-success">View</a>'
                            .'&nbsp;&nbsp;&nbsp;<a id="edit" data-id="'.$data['id'].'" class="btn btn-sm btn-warning">Edit</a>'
                            .'&nbsp;&nbsp;&nbsp;<a id="delete_user" data-id="'.$data['id'].'" class="btn btn-sm btn-danger">Delete</a>';
            array_push($result,$data);
            $i++;
        }
        
        return json_encode($result);
    }

    public function edit(){
        $data = $this->input->post();

        $url = "http://localhost/data-api/v1/api/editUser";

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_POSTFIELDS,http_build_query($data));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curl);

        echo $response;

    }

    // add user

    public function add(){
        return false;
    }

    // delete

    public function delete(){
        $id = $this->input->post('id');
        
        $url = 'http://localhost/data-api/v1/api/deleteUser';

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_POSTFIELDS, "id=$id");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curl);

        echo $response;

        curl_close($curl);

    }

    // view
    public function view(){

        $id = $this->input->get('id');

        $url = 'http://localhost/data-api/v1/api/getUserById';

        $curl = curl_init($url.'?id='.$id);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curl);

        echo $response;

        curl_close($curl);

    }


}

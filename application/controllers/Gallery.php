<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gallery extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('gallery_model');
    }
    public function index()
    {
        $this->data['page_title'] = "Gallery";

        $this->render_view_template("backend/gallery/index", $this->data);
    }

    public function getAllImages()
    {
        $data = $this->gallery_model->getAllImages();

        $result = $this->__processData($data);

        echo $result;
    }

    private function __processData($response)
    {
        $result = [];
        $i = 1;
        foreach ($response as $key => $data) {
            $content['sl'] = $i;
            $content['file'] = '<img height="100px" width="100px" src="' . base_url() . 'uploads/' . $data['name'] . '">';
            $content['action'] = '<a id="delete_user" data-id="' . $data['id'] . '" class="btn btn-sm btn-danger">Delete</a>';
            array_push($result, $content);
            $i++;
        }

        return json_encode(["data" => $result]);
    }

    public function upload()
    {
        // sleep(3);
        if ($_FILES["files"]["name"] != '') {
            $data = [];
            $config["upload_path"] = 'uploads/';
            $config["encrypt_name"] = true;
            $config["allowed_types"] = 'gif|jpg|png';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            for ($count = 0; $count < count($_FILES["files"]["name"]); $count++) {
                $_FILES["file"]["name"] = $_FILES["files"]["name"][$count];
                $_FILES["file"]["type"] = $_FILES["files"]["type"][$count];
                $_FILES["file"]["tmp_name"] = $_FILES["files"]["tmp_name"][$count];
                $_FILES["file"]["error"] = $_FILES["files"]["error"][$count];
                $_FILES["file"]["size"] = $_FILES["files"]["size"][$count];
                if ($this->upload->do_upload('file')) {
                    array_push($data, $this->upload->data());
                }
            }
            $this->gallery_model->upload($data);
        }
    }

    // delete
    public function delete()
    {
        $id = $this->input->post('id');
        $this->deleteLocalFile($id);
        $result = $this->gallery_model->delete($id);
        if ($result) {
            echo json_encode(['Message' => "Deleted", "status" => "success"]);
        } else {
            echo json_encode(['error' => 'There is problem to add record']);
        }
    }

    // delete file from local
    public function deleteLocalFile($id)
    {
        $result = $this->gallery_model->imageDetails($id);
        $file = 'uploads/'.$result->name;
        if(file_exists($file)){
            unlink($file); 
        }else{
            exit;
        }   
    }

    // public function add()
    // {
    //     // Check form submit or not
    //     if ($this->input->post('upload') != null) {

    //         $data = array();

    //         // Count total files
    //         $countfiles = count($_FILES['files']['name']);

    //         // Looping all files
    //         for ($i = 0; $i < $countfiles; $i++) {

    //             if (!empty($_FILES['files']['name'][$i])) {

    //                 // Define new $_FILES array - $_FILES['file']
    //                 $_FILES['file']['name'] = $_FILES['files']['name'][$i];
    //                 $_FILES['file']['type'] = $_FILES['files']['type'][$i];
    //                 $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
    //                 $_FILES['file']['error'] = $_FILES['files']['error'][$i];
    //                 $_FILES['file']['size'] = $_FILES['files']['size'][$i];

    //                 // Set preference
    //                 $config['upload_path'] = 'uploads/';
    //                 $config['allowed_types'] = 'jpg|jpeg|png|gif';
    //                 $config['max_size'] = '5000'; // max_size in kb
    //                 $config['file_name'] = $_FILES['files']['name'][$i];

    //                 //Load upload library
    //                 $this->load->library('upload', $config);

    //                 // File upload
    //                 if ($this->upload->do_upload('file')) {
    //                     // Get data about the file
    //                     $uploadData = $this->upload->data();
    //                     $filename = $uploadData['file_name'];

    //                     // Initialize array
    //                     $data['filenames'][] = $filename;
    //                 }
    //             }

    //         }

    //         $this->index();
    //     } else {

    //         // load view
    //         $this->index();
    //     }

    // }

}

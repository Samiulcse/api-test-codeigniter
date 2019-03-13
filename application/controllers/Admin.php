<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('admin_model','a_model');
    }

    public function index(){
        $this->data['page_title'] = "Role";
        $this->render_view_template('backend/dashboard',$this->data);
    }

    public function roles()
    {
        $this->data['page_title'] = "Role";

        $this->render_view_template('backend/role/role', $this->data);
    }

    public function saverole(){
        
        $result = $this->a_model->saverole($this->input->post());

        if($result){
            return redirect(base_url('admin/allroles'));
        }else{
            return redirect(base_url('admin/roles'));
        }

    }

    public function allroles(){
        
        $this->data['page_title'] = "All Roles";

        $this->render_view_template('backend/role/allrole', $this->data);

    }

    public function getallroles(){
        $results = $this->a_model->allroles();
        $id=1;
        foreach ($results as $key => $result) {
            $response['id'] = $id++;
            $response['role_name'] = $result->role_name;
            $response['action'] = '<a class="btn btn-warning" href="'.base_url('admin/editrole/').$result->id.'">Edit<a/>
                                    <a class="btn btn-danger" href="'.base_url('admin/deleterole/').$result->id.'">Delete<a/>';
            // $response['role_type'] = unserialize($result->role_type);
            // $response['permissions'] = unserialize($result->permissions);
        }

        echo json_encode($response, true);
    }

    public function editrole($id =null){
        $result = $this->a_model->getRoleById($id);

        $response['id']=$result->id;
        $response['role_name']=$result->role_name;
        $this->data['role_type']=unserialize($result->role_type);
        $this->data['permissions']=unserialize($result->permissions);
        
        $this->data['page_title'] = "All Roles";

        $this->data['response'] = $response;

        $this->render_view_template('backend/role/edit-role', $this->data);
    }
}

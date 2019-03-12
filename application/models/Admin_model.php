<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function saverole($data)
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        exit;
        $data = array(
            'role_type' => serialize($data['role_type']),
            'permissions' => serialize($data['permissions']),
            'role_name' => $data['role_name'],
        );

        $result=$this->db->insert('roles', $data);
        return $result;
    }

    public function allroles()
    {
        // $result=$this->db->select('*')->from('roles')->get()->result();
         $result=$this->db->get('roles')->result();
        
        return $result;
    }

    public function getRoleById($id)
    {
         $result=$this->db->where('id',$id)->get('roles')->row();
        
        return $result;
    }
}

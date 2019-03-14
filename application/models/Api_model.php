<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api_model extends CI_Model
{

    public function getAllUsers()
    {
        $this->db->select('*');
        $this->db->from('users');
        $query = $this->db->order_by('id',"desc")->get()->result();

        return $query;

        // $this->db->get('users');
        // $result= $this->db->result_array();

        // return $result;
    }

    public function getUserById($id)
    {
        return $this->db->where('id', $id)->get('users')->row();
    }

    public function addNewUser($user_data)
    {
        $this->db->insert('users', $user_data);

        $id = $this->db->insert_id();

        return $id;
    }

    public function editUser($id, $data)
    {
        $this->db->where('id', $id);

        $result = $this->db->update('users', $data);

        return $result;
    }

    public function deleteUser($id)
    {

        $this->db->where('id', $id);

        $result = $this->db->delete('users');

        return $result;
    }

    public function deleteAllSelected($ids){
        if($ids){
            $this->db->where_in('id', $ids);
            $result = $this->db->delete('users');
            return $result;
        }
    }
    
}

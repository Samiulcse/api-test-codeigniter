<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Excel_model extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert($data)
	{
		$this->db->insert_batch('excel_users', $data);
    }
    
    public function insertInstituteData($data)
	{
		$this->db->insert_batch('institute_information', $data);
    }
    
    public function delete($id)
    {
        $this->db->where('id', $id);
        $result = $this->db->delete('excel_users');
        return $result;
    }



}

?>
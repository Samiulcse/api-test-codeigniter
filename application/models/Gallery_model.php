<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Gallery_model extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllImages()
    {
        $this->db->select('*');
        $result = $this->db->get('gallerys')->result_array();
        return $result;
    }

    public function upload($files)
    {
        foreach($files as $file){
            $data = array(
                "name" =>$file['file_name']
            );
            $this->db->insert('gallerys',$data);
        }
    }

    public function imageDetails($id)
    {
        return $this->db->where('id',$id)->get('gallerys')->row();
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $result = $this->db->delete('gallerys');
        return $result;
    }



}

?>
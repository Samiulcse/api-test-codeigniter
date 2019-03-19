<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Dependent_model extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }

    public function allDivision()
    {
       return $this->db->get('divisions')->result_array();
    }

    public function getDistricts($id)
    {
        return $this->db->where('division_id',$id)->get('districts')->result_array();
    }


    public function getUpazilas($id)
    {
        return $this->db->where('district_id',$id)->get('upazilas')->result_array();
    }

    public function getUnions($id)
    {
        return $this->db->where('upazila_id',$id)->get('unions')->result_array();
    }
}
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Faker_model extends CI_Model
{
    public function seed($data = null)
    {
        $this->db->insert('users',$data);
    }
}

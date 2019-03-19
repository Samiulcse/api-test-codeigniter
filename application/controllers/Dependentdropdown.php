<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Dependentdropdown extends Admin_Controller{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('dependent_model');
    }

    public function index()
    {
        $this->data['page_title'] = "Dependent Dropdown";
        $this->data['divisions'] = $this->dependent_model->allDivision();
        $this->render_view_template('backend/dependent-dropdown/index',$this->data);
    }

    public function getDistricts()
    {
        $id = $this->input->get('id');
        $districts = $this->dependent_model->getDistricts($id);

        if($districts>0){
            $HTML="<option disabled selected>Select District</option>";
            foreach ($districts as $key => $district) {
                $HTML.="<option value='".$district['id']."'>".$district['bn_name']."</option>";
            }
            
        }
        
        echo $HTML;
    }


    public function getUpazilas()
    {
        $id = $this->input->get('id');
        $upazilas = $this->dependent_model->getUpazilas($id);

        if($upazilas>0){
            $HTML="<option disabled selected>Select upazila</option>";
            foreach ($upazilas as $key => $upazila) {
                $HTML.="<option value='".$upazila['id']."'>".$upazila['bn_name']."</option>";
            }
            
        }
        
        echo $HTML;
    }

    public function getUnions()
    {
        $id = $this->input->get('id');

        $unions = $this->dependent_model->getUnions($id);

        if($unions>0){
            $HTML=" <option disabled selected>Select Union</option>";
            foreach ($unions as $key => $union) {
                $HTML.="<option value='".$union['id']."'>".$union['bn_name']."</option>";
            }
            
        }
        
        echo $HTML;
    }
}
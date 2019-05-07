<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Excelimport extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('excel_model');
        $this->load->library('excel');
        $this->load->library('pagination');
    }

    public function index()
    {
        $this->data['page_title'] = "Excel Import";
        $this->render_view_template('backend/excel/index', $this->data);
    }

    public function institute()
    {
        $this->data['page_title'] = "Excel Import";
        $this->render_view_template('backend/excel/institute', $this->data);
    }

    public function importInstituteInfo()
    {
        if (isset($_FILES["file"]["name"])) {
            $path = $_FILES["file"]["tmp_name"];
            $object = PHPExcel_IOFactory::load($path);
            foreach ($object->getWorksheetIterator() as $worksheet) {
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                for ($row = 2; $row <= $highestRow; $row++) {

                    $institute_name = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $eiin = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $institute_type = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $division_id = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $division = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $district_id = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    $district = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                    $thana_id = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                    $thana = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
                    $union_id = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
                    $union_name = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
                    $mauza_id = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
                    $mauza_name = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
                    $area_status = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
                    $geogrpycal_status = $worksheet->getCellByColumnAndRow(14, $row)->getValue();
                    $address = $worksheet->getCellByColumnAndRow(15, $row)->getValue();
                    $post = $worksheet->getCellByColumnAndRow(16, $row)->getValue();
                    $management_type = $worksheet->getCellByColumnAndRow(17, $row)->getValue();
                    $mobile = $worksheet->getCellByColumnAndRow(18, $row)->getValue();
                    $student_type = $worksheet->getCellByColumnAndRow(19, $row)->getValue();
                    $education_level = $worksheet->getCellByColumnAndRow(20, $row)->getValue();
                    $affiliation = $worksheet->getCellByColumnAndRow(21, $row)->getValue();
                    $mpo_status = $worksheet->getCellByColumnAndRow(22, $row)->getValue();

                    $data[] = array(
                        'institute_name' => $institute_name,
                        'eiin' => $eiin,
                        'institute_type' => $institute_type,
                        'division_id' => $division_id,
                        'division' => $division,
                        'district_id' => $district_id,
                        'district' => $district,
                        'thana_id' => $thana_id,
                        'thana' => $thana,
                        'union_id' => $union_id,
                        'union_name' => $union_name,
                        'mauza_id' => $mauza_id,
                        'mauza_name' => $mauza_name,
                        'area_status' => $area_status,
                        'geogrpycal_status' => $geogrpycal_status,
                        'address' => $address,
                        'post' => $post,
                        'management_type' => $management_type,
                        'mobile' => $mobile,
                        'student_type' => $student_type,
                        'education_level' => $education_level,
                        'affiliation' => $affiliation,
                        'mpo_status' => $mpo_status
                    );

                }
            }

            $this->excel_model->insertInstituteData($data);

            echo 'Data Imported successfully';
        }
    }


    public function import()
    {
        if (isset($_FILES["file"]["name"])) {
            $path = $_FILES["file"]["tmp_name"];
            $object = PHPExcel_IOFactory::load($path);
            foreach ($object->getWorksheetIterator() as $worksheet) {
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                for ($row = 2; $row <= $highestRow; $row++) {
                    $name = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $phone = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $gender = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $address = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $data[] = array(
                        'name' => $name,
                        'phone' => $phone,
                        'gender' => $gender,
                        'address' => $address,
                    );
                }
            }

            $this->excel_model->insert($data);

            echo 'Data Imported successfully';
        }
    }

    public function loadRecord($rowno = 0)
    {

        $rowperpage = 5;

        if ($rowno != 0) {
            $rowno = ($rowno - 1) * $rowperpage;
        }

        $allcount = $this->db->count_all('excel_users');

        $this->db->limit($rowperpage, $rowno);
        $users_record = $this->db->get('excel_users')->result_array();

        $config['base_url'] = base_url() . 'excelimport/loadRecord';
        $config['use_page_numbers'] = true;
        $config['total_rows'] = $allcount;
        $config['per_page'] = $rowperpage;

        $config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav></div>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tag_close'] = '<span aria-hidden="true"></span></span></li>';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tag_close'] = '</span></li>';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tag_close'] = '</span></li>';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tag_close'] = '</span></li>';

        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();
        $data['result'] = $users_record;
        $data['row'] = $rowno;

        echo json_encode($data);
    }

    public function delete()
    {
        $id = $this->input->post('id');
        $result = $this->excel_model->delete($id);
        if ($result) {
            echo json_encode(['Message' => "Deleted", "status" => "success"]);
        } else {
            echo json_encode(['error' => 'There is problem to add record']);
        }
    }



}

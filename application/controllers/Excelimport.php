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

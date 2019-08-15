<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Tapel extends REST_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("M_app");
        $this->load->model("M_tapel");
    }

     function all_get() {
        $ids = $this->M_app->getSemesterActive();
        $kalender = $this->M_kalender->getKalenderAll($ids);

        $kalender = ($kalender->num_rows() != 0 ? $kalender->result_array() : ['Empty']);

        $this->response([
            'data' => $kalender,
            'message' => "Proses berhasil",
            'status' => TRUE
        ], REST_Controller::HTTP_OK);
    }

   
}
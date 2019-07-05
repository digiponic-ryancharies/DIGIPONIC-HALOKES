<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Distribusi extends REST_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("M_app");
        $this->load->model("M_distribusi");
        $this->load->model("M_guru");
        $this->load->model("M_kelas");
    }

    function walikelas_get() {
        $ids = $this->M_app->getSemesterActive();

        $wakel = $this->M_distribusi->getAllWaliKelasAktif($ids);
        $kelas = $this->M_kelas->getKelasTanpaWakel($ids);
        $guru = $this->M_guru->getGuruBelumWakel($ids);

        $kelas = (($kelas->num_rows() != 0) ? $kelas->result_array() : []);
        $wakel = (($wakel->num_rows() != 0) ? $wakel->result_array() : []);
        $guru = (($guru->num_rows() != 0) ? $guru->result_array() : []);

        $this->response([
            'kelas' => $kelas,
            'guru' => $guru,
            'wali_kelas' => $wakel,
            'message' => "Proses berhasil",
            'status' => TRUE
        ], REST_Controller::HTTP_OK);
    }
}
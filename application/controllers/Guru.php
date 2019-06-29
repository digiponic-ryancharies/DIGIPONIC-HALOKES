<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("M_session");
    }

    function index() {
        $session = $this->M_session->get_session();
        if (!$session['session_userid'] && !$session['session_status']) {
            /*$data['message'] = "<p>The page you requested was not found.</p>";
            $this->load->view("errors/html/error_404", $data);*/
            redirect("login");
        } else {
            $data = [
                "userid" => $session['session_userid'],
                "userstts" => $session['session_status']
            ];

            if($session['session_status'] == "pegawai") {
                $this->load->view("template/pegawai_header", $data);
                $this->load->view("pegawai/guru", $data);
                $this->load->view("template/pegawai_footer");
            } else {

            }
        }
    }

    function pengajar() {
        $session = $this->M_session->get_session();
        if (!$session['session_userid'] && !$session['session_status']) {
            /*$data['message'] = "<p>The page you requested was not found.</p>";
            $this->load->view("errors/html/error_404", $data);*/
            redirect("login");
        } else {
            $data = [
                "userid" => $session['session_userid'],
                "userstts" => $session['session_status']
            ];

            if($session['session_status'] == "guru") {
                $this->load->view("template/kurikulum_header", $data);
                $this->load->view("kurikulum/guru_pengajar", $data);
                $this->load->view("template/kurikulum_footer");
            } else {
            }
        }
    }

    function silabus() {}

    function promes() {}
}
<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("M_session");
    }

    function index() {
        $session = $this->M_session->get_session();
        if (!$session['session_userid'] && !$session['session_role']) {
            /*$data['message'] = "<p>The page you requested was not found.</p>";
            $this->load->view("errors/html/error_404", $data);*/
            redirect("login");
        } else {
            $data = [
                "userid" => $session['session_userid'],
                "userstts" => $session['session_status'],
                "usernama" => $session['session_nama']
            ];

            if($session['session_role'] == "pegawai") {
                $data = [
                    "header" => $this->load->view("template/pegawai_header", $data, TRUE),
                    "footer" => $this->load->view("template/pegawai_footer", '', TRUE)
                ];

                $this->load->view("pegawai/guru", $data);
            } else {

            }
        }
    }

    function pengajar() {
        $session = $this->M_session->get_session();
        if (!$session['session_userid'] && !$session['session_role']) {
            /*$data['message'] = "<p>The page you requested was not found.</p>";
            $this->load->view("errors/html/error_404", $data);*/
            redirect("login");
        } else {
            $data = [
                "userid" => $session['session_userid'],
                "userstts" => $session['session_status'],
                "usernama" => $session['session_nama']
            ];

            if($session['session_role'] == "guru") {
                if(strpos($session['session_status'], '1')) {
                    $data = [
                        "header" => $this->load->view("template/guru_header", $data, TRUE),
                        "footer" => $this->load->view("template/guru_footer", '', TRUE)
                    ];

                    $this->load->view("kurikulum/guru_pengajar", $data);
                }
            } else {
                
            }
        }
    }

    function silabus() {}

    function promes() {}
}
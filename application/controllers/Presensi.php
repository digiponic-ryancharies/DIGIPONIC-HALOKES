<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Presensi extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("m_app");
        $this->load->model("M_session");
    }

    function kbm() {
		$session = $this->M_session->get_session();
        if (!$session['session_userid'] && !$session['session_role']) {
            /*$data['message'] = "<p>The page you requested was not found.</p>";
            $this->load->view("errors/html/error_404", $data);*/
            redirect("login");
        } else {
            $data = [
                "userid" => $session['session_userid'],
                "userstts" => $session['session_status'],
                "usernama" => $session['session_nama'],
                "dateNow" => $this->m_app->dateNow(),
                "yearNow" => $this->m_app->yearNow(),
                "bulanIndo" => $this->m_app->bulanIndo()
            ];

            if($session['session_role'] == "guru") {
                if(strpos($session['session_status'], '1')) {
                    $data = [
                        "header" => $this->load->view("template/guru_header", $data, TRUE),
                        "footer" => $this->load->view("template/guru_footer", '', TRUE)
                    ];

                    $this->load->view("kurikulum/presensi_kbm", $data);
                }
		    } else if($session['session_role'] == "siswa") {

            } else if($session['session_role'] == "ortu") {

            }
        }
    }

    function ekstrakurikuler() {
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

                    $this->load->view("kurikulum/presensi_ekskul", $data);
                }
		    } else if($session['session_role'] == "siswa") {

            } else if($session['session_role'] == "ortu") {

            }
        }
    }
}
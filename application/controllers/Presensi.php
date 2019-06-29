<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Presensi extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("m_app");
        $this->load->model("M_session");
    }

    function kbm() {
		$session = $this->M_session->get_session();
        if (!$session['session_userid'] && !$session['session_status']) {
            /*$data['message'] = "<p>The page you requested was not found.</p>";
            $this->load->view("errors/html/error_404", $data);*/
            redirect("login");
        } else {
            $data = [
                "userid" => $session['session_userid'],
                "userstts" => $session['session_status'],
                "dateNow" => $this->m_app->dateNow(),
                "yearNow" => $this->m_app->yearNow(),
                "bulanIndo" => $this->m_app->bulanIndo()
            ];

            if($session['session_status'] == "guru") {
		        $this->load->view("template/kurikulum_header", $data);
		        $this->load->view("kurikulum/presensi_kbm", $data);
		        $this->load->view("template/kurikulum_footer");
		    } else if($session['session_status'] == "siswa") {

            } else if($session['session_status'] == "ortu") {

            }
        }
    }

    function ekstrakurikuler() {
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
		        $this->load->view("kurikulum/presensi_ekskul", $data);
		        $this->load->view("template/kurikulum_footer");
		    } else if($session['session_status'] == "siswa") {

            } else if($session['session_status'] == "ortu") {

            }
        }
    }
}
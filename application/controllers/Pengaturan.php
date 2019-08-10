<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library("Curl");
        $this->load->model("M_session");
    }

    function tapel() {
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

			if($session['session_role'] == "superadmin") {
				$data = [
					"header" => $this->load->view("template/sadmin_header", $data, TRUE),
					"footer" => $this->load->view("template/sadmin_footer", '', TRUE)
				];

				$this->load->view("kurikulum/atur_tapel", $data);
			} else if($session['session_role'] == "guru") {
				$data = [
					"header" => $this->load->view("template/guru_header", $data, TRUE),
					"footer" => $this->load->view("template/guru_footer", '', TRUE)
				];

				if(strpos($session['session_status'], '0')) {

				} else if(strpos($session['session_status'], '1')) {
			        $this->load->view("kurikulum/atur_tapel", $data);
				}
			}
		}
    }

    function semester() {
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

			if($session['session_role'] == "superadmin") {
				$data = [
					"header" => $this->load->view("template/sadmin_header", $data, TRUE),
					"footer" => $this->load->view("template/sadmin_footer", '', TRUE)
				];

				$this->load->view("kurikulum/atur_semester", $data);
			} else if($session['session_role'] == "guru") {
				$data = [
					"header" => $this->load->view("template/guru_header", $data, TRUE),
					"footer" => $this->load->view("template/guru_footer", '', TRUE)
				];

				if(strpos($session['session_status'], '0')) {

				} else if(strpos($session['session_status'], '1')) {
			        $this->load->view("kurikulum/atur_semester", $data);
				}
			}
		}
    }

    function jampel() {
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

			if($session['session_role'] == "superadmin") {
				$data = [
					"header" => $this->load->view("template/sadmin_header", $data, TRUE),
					"footer" => $this->load->view("template/sadmin_footer", '', TRUE)
				];

				$this->load->view("kurikulum/atur_jampel", $data);
			} else if($session['session_role'] == "guru") {
				$data = [
					"header" => $this->load->view("template/guru_header", $data, TRUE),
					"footer" => $this->load->view("template/guru_footer", '', TRUE)
				];

				if(strpos($session['session_status'], '0')) {

				} else if(strpos($session['session_status'], '1')) {
			        $this->load->view("kurikulum/atur_jampel", $data);
				}
			}
		}
    }

    function tambah_tapel() {

    }
}
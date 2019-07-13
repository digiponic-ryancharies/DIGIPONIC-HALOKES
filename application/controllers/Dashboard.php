<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
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

			if($session['session_role'] == "superadmin") {
				$data = [
					"header" => $this->load->view("template/sadmin_header", $data, TRUE),
					"footer" => $this->load->view("template/sadmin_footer", '', TRUE)
				];

				$this->load->view("sadmin/index", $data);
			} else if($session['session_role'] == "guru") {
				$data = [
					"header" => $this->load->view("template/guru_header", $data, TRUE),
					"footer" => $this->load->view("template/guru_footer", '', TRUE)
				];

				if(strpos($session['session_status'], '0')) {

				} else if(strpos($session['session_status'], '1')) {
			        $this->load->view("kurikulum/index", $data);
				} else if(strpos($session['session_status'], '2')) {
			        $this->load->view("kesiswaan/index", $data);
				}
			} else if($session['session_role'] == "siswa") {

			} else if($session['session_role'] == "ortu") {

			} else if($session['session_role'] == "pegawai") {
				$data = [
					"header" => $this->load->view("template/pegawai_header", $data, TRUE),
					"footer" => $this->load->view("template/pegawai_footer", '', TRUE)
				];
				
		        $this->load->view("pegawai/index", $data);
			}
		}
    }
}
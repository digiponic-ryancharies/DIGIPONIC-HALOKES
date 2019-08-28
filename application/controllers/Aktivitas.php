<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Aktivitas extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("M_session");
        $this->load->model("M_aktivitas");
    }

    function user() {
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

				$data['au'] = $this->M_aktivitas->showAktivitasUser();

				$this->load->view("sadmin/aktivitas_user", $data);
			}
		}
    }
}
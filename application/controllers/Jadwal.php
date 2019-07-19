<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("M_session");
        $this->load->model("M_jadwal");
        $this->load->library("curl"); // library curl
    }

    function mapel() {
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

				// API Execute
                $url = site_url().'/api/jadwal/all';
                $res = $this->curl->get($url);
                $data['jadwal'] = ($res->status == true ? $res->data : []); 

			    $this->load->view("kurikulum/jadwal_mapel", $data);
			} else if($session['session_role'] == "guru") {
				$data = [
					"header" => $this->load->view("template/guru_header", $data, TRUE),
					"footer" => $this->load->view("template/guru_footer", '', TRUE)
				];

				if(strpos($session['session_status'], '1')) {
			        $this->load->view("kurikulum/jadwal_mapel", $data);
				}
			}
		}
    }

    function atur_mapel() {
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

			if($session['session_role'] == "guru" || $session['session_role'] == "superadmin") {
				$data = [
					"jadwal" => $this->input->post("id"),
					"hari" => $this->input->post("hari"),
					"jam_awal" => $this->input->post("jam_awal"),
					"jam_akhir" => $this->input->post("jam_akhir")
				];

				$url = site_url()."/api/jadwal/aturjadwal";
				$res = $this->curl->post($url,$data);

                $this->session->set_flashdata('do', "atur_jadwal");
                $this->session->set_flashdata('status', $res->status);
                $this->session->set_flashdata('msg', (isset($res->message) ? $res->message : $res->error));
                redirect('jadwal/mapel');
			}
		}
    }

    function get_jadwal_by_id($id) {
    	$res = $this->M_jadwal->getJadwalByID($id);
        echo json_encode($res->row());
    }
}
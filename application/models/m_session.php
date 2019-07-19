<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_session extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	function get_session(){
		$data['session_userid'] = $this->session->userdata('session_userid');
		$data['session_role'] = $this->session->userdata('session_role');
		$data['session_status'] = $this->session->userdata('session_status');
		$data['session_nama'] = $this->session->userdata('session_nama');
		return $data;
	}

	function store_session($userid,$role,$status,$nama){
		$this->session->set_userdata('session_userid', $userid);
		$this->session->set_userdata('session_role', $role);
		$this->session->set_userdata('session_status', $status);
		$this->session->set_userdata('session_nama', $nama);
	}

	function destroy_session() {
		$this->session->unset_userdata('session_userid');
		$this->session->unset_userdata('session_role');
		$this->session->unset_userdata('session_status');
		$this->session->unset_userdata('session_nama');
	}
}
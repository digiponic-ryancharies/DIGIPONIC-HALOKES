<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("M_session");
    }

    function index() {
        $this->load->view("login");
    }

    function auth() {
    	$data = [
    		'username' => $this->input->post('username'),
    		'password' => $this->input->post('password'),
    	];

    	$url = site_url().'/api/auth/login';

    	$ch = curl_init($url);
    	curl_setopt($ch, CURLOPT_POST, true);
    	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    	$response = curl_exec($ch);

    	curl_close($ch);

    	$res = json_decode($response);
    	$data = $res->data;

    	if($res->status) {
            if($data->role == "guru") {
                $nama = $data->gelar->gelar_depan." ".$data->nama." ".$data->gelar->gelar_belakang;
                $this->M_session->store_session($data->id_user, $data->role, $data->status_guru, $nama);
            } else if($data->role == "superadmin") {
                $this->M_session->store_session($data->id_user, $data->role, 0, "Demo");
            }

    		redirect("dashboard");
    	} else {
    		redirect("login");
    	}
    }
}
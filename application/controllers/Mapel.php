<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mapel extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library("Curl");
        $this->load->model("M_session");
        $this->load->model("M_kurikulum");
        $this->load->model("M_aktivitas");
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

                $url = site_url().'/api/mapel/all';
                $res = $this->curl->get($url);

                if($res->status == true) {
                    $data['mapel'] = $res->mapel;
                    $data['grupkur'] = $res->grupkur;
                } else {
                    $data['mapel'] = [];
                    $data['grupkur'] = [];
                }

                $this->load->view("kurikulum/mapel", $data);
            } else if($session['session_role'] == "guru") {
                $data = [
                    "header" => $this->load->view("template/guru_header", $data, TRUE),
                    "footer" => $this->load->view("template/guru_footer", '', TRUE)
                ];

                if(strpos($session['session_status'], '1')) {
                    $url = site_url().'/api/mapel/all';
                    $res = $this->curl->get($url);

                    if($res->status == true) {
                        $data['mapel'] = $res->mapel;
                        $data['grupkur'] = $res->grupkur;
                    } else {
                        $data['mapel'] = [];
                        $data['grupkur'] = [];
                    }

                    $this->load->view("kurikulum/mapel", $data);
                } 
            } else if($session['session_role'] == "siswa") {

            } else if($session['session_role'] == "ortu") {

            }
        }
    }

    function tambah_mapel() {
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
                if(strpos($session['session_status'], '1')) {
                    $data = [
                        'kurikulum' => $this->input->post('kurikulum'),
                        'gmapel' => $this->input->post('grupmapel'),
                        'nama' => $this->input->post('nama'),
                        'kkm' => $this->input->post('kkm')
                    ];

                    $url = site_url().'/api/mapel/tambah';
                    $res = $this->curl->post($url,$data);

                    if($res->status == TRUE) {
                        $role = $session['session_role'];
                        $uid = $session['session_userid'];
                        $act = "insert";
                        $desc = "<b>data mapel</b>";
                        $this->M_aktivitas->tambahAktivitasUser($role,$uid,$act,$desc);
                    }

                    $this->session->set_flashdata('do', "tambah_mapel");
                    $this->session->set_flashdata('status', $res->status);
                    $this->session->set_flashdata('msg', (isset($res->message) ? $res->message : $res->error));
                    redirect('mapel');
                }
            } else {

            }
        }
    }

    function get_gmapel_by_grupkur($id) {
        $res = $this->M_kurikulum->getGrupMapelByGrupKur($id);
        echo json_encode($res->result());
    }
}
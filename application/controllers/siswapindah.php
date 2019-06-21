<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Siswapindah extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }

    function index() {
        $this->load->view("template/kurikulum_header");
        $this->load->view("kesiswaan/siswapindah");
        $this->load->view("template/kurikulum_footer");
    }
    
}
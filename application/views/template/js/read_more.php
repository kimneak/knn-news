<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class read_more extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }
    public function index()
    {
        $this->load->model('article_model');
        $data="xxx";
        $this->load->view('template/header',$data);

    }
}
?>

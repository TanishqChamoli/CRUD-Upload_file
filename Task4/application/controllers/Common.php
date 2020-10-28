<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Common extends CI_Controller
{

    public function index()
    {
        $this->load->view('test');
    }
    function send()
    {
        echo "<pre>";
        print_r($_REQUEST);
    }
}

/* End of file Controllername.php */

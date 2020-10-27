<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{


    public function index()
    {
        $this->load->model('Homemodel');
        $this->load->view('common/header');
        $this->load->view('home');
        $this->load->view('common/footer');
    }
}

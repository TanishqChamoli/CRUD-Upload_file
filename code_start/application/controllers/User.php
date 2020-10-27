<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    function index(){
        $this->load->view('create');
    }

    function create()
    {
        // $this->load->view('create');
        echo "<pre>";
        print_r($_POST);
        die;
        $this->load->model('Usermodel');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');
        $this->form_validation->set_rules('pswd', 'password', 'required');
        $this->form_validation->set_rules('info', 'info', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('create');
            // reload the page as the data is incomplete 
        } else {
            // save user entry
            $formArray = array();
            $formArray['email'] = $this->input->post('email');
            $formArray['pass'] = $this->input->post('password');
            $formArray['info'] = $this->input->post('info');
            return $formArray;
            // $this->Usermodel->create($formArray);
            // $this->session->set_flashdata('success','Record added successfully!');
            // redirect(base_url().'index.php/user/index');
        }
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    function index()
    {
        redirect(base_url() . "user/create");
    }

    function common()
    {
        $this->load->model('Usermodel');
        return $users = $this->Usermodel->all();
    }

    public function update($id)
    {
        $this->load->model('Usermodel');
        $s_user = $this->Usermodel->getUser($id);
        $users = $this->Usermodel->all();
        $users = $this->common();
        $data['users'] = $users;
        $data['update'] = $s_user;
        $this->load->view('create', $data);
    }

    public function delete($id)
    {
        $this->load->model('Usermodel');
        $this->Usermodel->userDelete($id);
        redirect(base_url() . "user/create");
    }

    public function up_update()
    {
        $this->load->model('Usermodel');
        $formArray = array();
        $formArray['id'] = $this->input->post('id');
        $formArray['email'] = $this->input->post('email');
        $formArray['pass'] = $this->input->post('password');
        $formArray['info'] = $this->input->post('info');
        $this->Usermodel->updateUser($formArray);
        $this->session->set_flashdata('result', 'Updated the values!');
        redirect(base_url() . "user/create");
    }

    public function create()
    {
        $result = $this->session->flashdata('result');
        $data = array();
        if (isset($result)) {
            // print($result);
            $data['result'] = $result;
        }
        $this->load->model('Usermodel');
        $users = $this->Usermodel->all();
        $users = $this->common();
        $data['users'] = $users;
        // name of the variable to access is in the 
        $this->load->view('create', $data);
    }
    public function save()
    {
        $this->load->model('Usermodel');
        $formArray = array();
        $formArray['email'] = $this->input->post('email');
        $formArray['pass'] = $this->input->post('password');
        $formArray['info'] = $this->input->post('info');
        // print_r($formArray); 
        $this->Usermodel->create($formArray);
        $this->session->set_flashdata('result', 'Record added successfully!');
        redirect(base_url() . "user/create");
    }
}

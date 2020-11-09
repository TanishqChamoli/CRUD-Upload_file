<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function update($id)
    {
      
        $s_user = $this->Usermodel->getUser($id);
        $users = $this->Usermodel->all();
        $users = $this->common();
        $data['users'] = $users;
        $data['update'] = $s_user;
        $this->load->view('create', $data);
    }

    public function delete($id)
    {
      
        $this->Usermodel->userDelete($id);
        redirect(base_url() . "user/create");
    }
}
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
        // header and footer are loaded inside the pages only.
        public function index()
        {
                $this->load->view('dashboard/index');
        }
        public function tables()
        {
                $this->load->view('dashboard/tables');
        }

        public function charts()
        {
                $this->load->view('dashboard/charts');
        }

        public function login()
        {
                $result = $this->session->flashdata('result');
                $data = array();
                if (isset($result)) {
                        $data['result'] = $result;
                }
                $this->load->view('dashboard/login', $data);
        }

        public function password()
        {
                $this->load->view('dashboard/password');
        }

        public function register()
        {
                $result = $this->session->flashdata('result');
                $data = array();
                if (isset($result)) {
                        $data['result'] = $result;
                }
                $this->load->view('dashboard/register', $data);
        }

        public function static_nav()
        {
                $this->load->view('dashboard/layout-static');
        }

        public function light_sidenav()
        {
                $this->load->view('dashboard/layout-sidenav-light');
        }

        public function insert_user()
        {
                $this->load->model('Adminmodel');
                $formArray = array();
                $formArray['first_name'] = $this->input->post('f_name');
                $formArray['last_name'] = $this->input->post('l_name');
                $formArray['email'] = $this->input->post('email');
                $formArray['pass'] = $this->input->post('pass');
                $c_pass = $this->input->post('c_pass');
                if ($formArray['pass'] != $c_pass) {
                        $this->session->set_flashdata('result', 'Passwords are not same!');
                        redirect(base_url() . "index.php/Admin/register");
                } else {
                        $hash_id = password_hash($formArray['pass'], PASSWORD_DEFAULT);
                        $formArray['pass'] = $hash_id;
                        $this->Adminmodel->create($formArray);
                        $this->session->set_flashdata('result', 'Account has been added!');
                        redirect(base_url() . "index.php/Admin/register");
                }
        }

        public function login_check()
        {
                $this->load->model('Adminmodel');
                $formArray = array();
                $formArray['email'] = $this->input->post('email');
                $formArray['pass'] = $this->input->post('pass');
                $check = $this->Adminmodel->login_check($formArray);
                if ($check) {
                        redirect(base_url() . "index.php/Admin/");
                } else {
                        $this->session->set_flashdata('result', 'Username or Password is incorrect!');
                        redirect(base_url() . "index.php/Admin/login");
                }
                // $this->load->view('dashboard/login');
        }

        public function own_form_insert()
        {
                $this->load->model('Adminmodel');
                $formArray = array();
                $formArray['email'] = $this->input->post('email');
                $formArray['pass'] = $this->input->post('password');
                $formArray['info'] = $this->input->post('info');
                $this->Adminmodel->own_create($formArray);
                $this->session->set_flashdata('result', 'Account has been added!');
                redirect(base_url() . "index.php/Admin/own_form");
                
        }

        public function own_form()
        {
                $result = $this->session->flashdata('result');
                $data = array();
                if (isset($result)) {
                        $data['result'] = $result;
                }
                $this->load->view('dashboard/db_form',$data);
        }

        public function own_tables()
        {
                $this->load->model('Adminmodel');
                $data = array();
                $users = $this->Adminmodel->all();
                $data['users'] = $users;
                $this->load->view('dashboard/db_table', $data);
        }

        public function error_401()
        {
                $this->load->view('dashboard/401');
        }

        public function error_404()
        {
                $this->load->view('dashboard/404');
        }

        public function error_500()
        {
                $this->load->view('dashboard/500');
        }
}

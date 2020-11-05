<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
        // header and footer are loaded inside the pages only.
        private function not_login()
        {
                if (!($this->session->has_userdata('userEmail'))) {
                        $this->session->set_flashdata('result', 'Please Login First!');
                        redirect(base_url() . "index.php/Admin/login");
                }
        }
        private function logout_back()
        {
                $this->session->unset_userdata('userEmail');
        }
        public function index()
        {
                $this->not_login();
                $this->load->view('dashboard/index');
        }
        public function tables()
        {
                $this->not_login();
                $this->load->view('dashboard/tables');
        }

        public function charts()
        {
                $this->not_login();
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
                $this->not_login();
                $this->load->view('dashboard/layout-static');
        }

        public function light_sidenav()
        {
                $this->not_login();
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
                        $this->session->set_userdata('userEmail', $formArray['email']);
                        redirect(base_url() . "index.php/Admin/");
                } else {
                        $this->session->set_flashdata('result', 'Username or Password is incorrect!');
                        redirect(base_url() . "index.php/Admin/login");
                }
        }

        public function own_form_insert()
        {
                $this->not_login();
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
                $this->not_login();
                $result = $this->session->flashdata('result');
                $data = array();
                if (isset($result)) {
                        $data['result'] = $result;
                }
                $this->load->view('dashboard/db_form', $data);
        }

        public function own_tables()
        {
                $this->not_login();
                $this->load->model('Adminmodel');
                $data = array();
                $users = $this->Adminmodel->all();
                $data['users'] = $users;
                $this->load->view('dashboard/db_table', $data);
        }

        public function logout()
        {
                $this->logout_back();
                redirect(base_url() . "index.php/Admin/login");
        }

        public function error_401()
        {
                $this->not_login();
                $this->load->view('dashboard/401');
        }

        public function error_404()
        {
                $this->not_login();
                $this->load->view('dashboard/404');
        }

        public function error_500()
        {
                $this->not_login();
                $this->load->view('dashboard/500');
        }
        public function delete_user()
        {
                $this->load->model('Adminmodel');

                $this->load->view('dashboard/500');
        }
        public function update_user($id)
        {
                $this->not_login();
                $this->load->model('Adminmodel');
                $s_user = $this->Adminmodel->getUser($id);
                $data['update'] = $s_user;
                // print_r($data['update']);
                $this->load->view('dashboard/db_form', $data);
        }
        function common()
        {
                $this->load->model('Adminmodel');
                return $users = $this->Adminmodel->all();
        }
        public function up_update()
        {
                $this->load->model('Adminmodel');
                $formArray = array(); //we don't need to define it as array just make key 
                $formArray['id'] = $this->input->post('id');
                $formArray['email'] = $this->input->post('email');
                $formArray['pass'] = $this->input->post('password');
                $formArray['info'] = $this->input->post('info');
                $this->Adminmodel->updateUser($formArray);
                redirect(base_url() . "index.php/Admin/own_tables");
        }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
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
                $this->load->view('dashboard/login');
        }

        public function password()
	{
                $this->load->view('dashboard/password');
        }

        public function register()
	{
                $this->load->view('dashboard/register');
        }

        public function static_nav()
	{
                $this->load->view('dashboard/layout-static');
        }
        public function light_sidenav(){
                // $this->load->view('dashboard/header');
                // $this->load->view('dashboard/navbar');
                $this->load->view('dashboard/layout-sidenav-light');
                // $content  = $this->load->view('dashboard/header');
                // $content .= $this->load->view('dashboard/navbar');
                // $content .= $this->load->view('dashboard/layout-sidenav-light');
                // return $content;
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

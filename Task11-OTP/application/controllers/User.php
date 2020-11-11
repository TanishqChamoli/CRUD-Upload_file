<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function index()
    {
        $this->load->view('contact.php');
    }

    public function send_mail()
    {
        $this->load->config('email');
        $this->load->library('email');

        print_r($_POST);

        $formArray['name'] = $this->input->post('name');
        $formArray['email'] = $this->input->post('email');
        $formArray['message'] = $this->input->post('message');
        $this->email->from($this->config->item('smtp_user'));
        $this->email->to($formArray['email']);
        $this->email->subject($formArray['name']);
        $this->email->message($formArray['message']);

        if ($this->email->send()) {
            echo 'Your Email has successfully been sent.';
        } else {
            show_error($this->email->print_debugger());
        }
    }
    public function otp()
    {
        $this->load->view('otp.php');
    }

    public function otp_back()
    {
        $mobile =  $_POST['mobile'];
        if ((strlen($mobile) > 10) || (strlen($mobile) < 10)) {
            redirect(base_url() . "index.php/user/otp?message=Please enter a correct number!");
        } else {
            $apiKey = urlencode('E/uuCTP2P/E-I4qkNVbktKq8D4mU6ctGpHZzJVsO61');
            // Message details
            $numbers = $mobile;
            $sender = urlencode('TXTLCL');
            session_start();
            $_SESSION['otp'] = rand(100000, 999999);
            print($_SESSION['otp']);

            $message = rawurlencode("THE OTP IS :" . $_SESSION['otp']);

            // Prepare data for POST request
            $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
            // Send the POST request with cURL
            $ch = curl_init('https://api.textlocal.in/send/');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch);
            // Process your response here
            echo $response;

            // should stop this for the checking of the otp
            redirect(base_url() . "index.php/user/otp_confirm");
        }
    }
    public function otp_confirm()
    {
        if (isset($_POST['otp'])) {
            session_start();
            if ($_POST['otp'] == $_SESSION['otp']) {
                session_destroy();
                redirect(base_url() . "index.php/user/otp_confirm?message=Correct otp");
            } else {
                redirect(base_url() . "index.php/user/otp?message=Retry");
            }
        } else {
            $this->load->view('otp_confirm.php');
        }
    }
    public function maps(){
        $this->load->view('maps');
    }
}

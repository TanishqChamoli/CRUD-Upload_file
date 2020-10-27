<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usermodel extends CI_Model
{
    function create($formArray){
        $this->db->insert('user',$formArray);
        // this will execute "INSERT INTO user (email,pass,info) values (?, ?, ? );
    }
}

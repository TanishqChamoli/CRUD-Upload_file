<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usermodel extends CI_Model
{
    function create($formArray){
        print
        $this->db->insert('user',$formArray);
        // this will execute "INSERT INTO user (email,pass,info) values (?, ?, ? );
    }

    function all(){
        return $users = $this->db->get('user')->result_array();
    }
    // make a function to run SELECT * from where id=$id;

    function getUser($id){
        $this->db->where('id',$id);
        return $user = $this->db->get('user')->row_array();
    }

    function updateUser($formArray){
        $this->db->where('id',$formArray['id']);
        $this->db->update('user',$formArray);
    }

    function userDelete($id){
        $this->db->where('id',$id);
        $this->db->delete('user');
    }


}

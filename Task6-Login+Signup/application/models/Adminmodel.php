<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Adminmodel extends CI_Model
{


    function create($formArray){
        // print
        $this->db->insert('admin_users',$formArray);
        // this will execute "INSERT INTO user (email,pass,info) values (?, ?, ? );
    }

    function login_check($formArray){
        $this->db->where('email',$formArray['email']);
        // $this->db->where('pass',$formArray['pass']);
        $user = $this->db->get('admin_users')->row_array();
        if(!empty($user)){
            if(password_verify ( $formArray['pass'] , $user['pass'])){
                return True;
            }
            else{
                return False;
            }
        }
        else{
            return False;
        }

    }
    // function all(){
    //     return $users = $this->db->get('user')->result_array();
    // }
    // // make a function to run SELECT * from where id=$id;

    // function getUser($id){
    //     $this->db->where('id',$id);
    //     return $user = $this->db->get('user')->row_array();
    // }

    // function updateUser($formArray){
    //     $this->db->where('id',$formArray['id']);
    //     $this->db->update('user',$formArray);
    // }

    // function userDelete($id){
    //     $this->db->where('id',$id);
    //     $this->db->delete('user');
    // }


}
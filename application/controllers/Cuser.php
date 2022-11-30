<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cuser extends CI_Controller {

	public function __construct(){
		parent::__construct();
		Header('Access-Control-Allow-Origin: *');
		Header('Access-Control-Allow-Headers: *');
		$this->load->model('mo_res');
	}

	public function login(){
        $data = $this->mo_res->getWhere('user_profil',array(
            'email_address' => $_POST['email'],
            'password' => md5($_POST['password'])
        ));

        echo json_encode($data);
	}

    public function register(){
        $data = $this->mo_res->input('user_profil',array(
            'email_address' => $_POST['email'],
            'password' => md5($_POST['password']),
            'name' => $_POST['name']
        ));
    }

    public function edit_profil(){
        $data = $this->mo_res->update('user_profil',array(
            'email_address' => $_POST['email'],
            'password' => md5($_POST['password']),
            'name' => $_POST['name']
        ),array(
            'id' => $_POST['id']
        ));
    }
}
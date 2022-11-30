<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CLogin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		Header('Access-Control-Allow-Origin: *');
		Header('Access-Control-Allow-Headers: *');
		header("Access-Control-Allow-Headers: *");
		$this->load->model('mo_res');
	}

	public function aksi_login(){
        echo md5(123);
		$cek = $this->mo_res->getWhere('tb_user',array(
            'username' => $_POST['username'],
            'password' => md5($_POST['password']),
        ));

        if($cek['row'] < 1){
            $arr_return = array(
                'status' => 'err',
                'msg' => 'user tidak ditemukan'
            );
        }else{
            $arr_return = array(
                'status' => 'ok',
                'msg' => 'user ditemukan',
                'data' => $cek['data'][0], 
            );
        }

        echo json_encode($arr_return);
	}
}

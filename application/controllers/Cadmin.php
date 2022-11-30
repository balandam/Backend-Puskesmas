<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadmin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		Header('Access-Control-Allow-Origin: *');
		Header('Access-Control-Allow-Headers: *');
		$this->load->model('mo_res');
	}

	public function index(){
		echo json_encode(array(
			'nama' => 'Akbar Mahmuddin Ghofur',
			'nrp' => 3121510101
		));
	}

	public function list_admin(){
		$data = $this->mo_res->getAll('tb_admin');
	
		echo json_encode($data);
	}
public function tambah_admin(){
		$nomor_pegawai = $_POST['nomor_pegawai'];
		$nomor_hp = $_POST['nomor_hp'];
		$nama = $_POST['nama'];
		

		$arr_input = array(
			'nomor_pegawai' => $nomor_pegawai,
			'nomor_hp' => $nomor_hp,
			'nama' => $nama,
		);

		$this->mo_res->input('tb_admin',$arr_input);
	}
	public function ambil_update(){
		$data = $this->mo_res->getWhere('tb_admin',array(
			'id' => $_GET['id']
		));

		echo json_encode($data);
	}
	//untuk mengupdate data
	public function simpan_update(){
		$this->mo_res->update('tb_admin',array(
			'nomor_pegawai' => $_POST['nomor_pegawai'],
			'nomor_hp' => $_POST['nomor_hp'],
			'nama' => $_POST['nama'],
		),array(
			'id' => $_POST['id']
		));
		
	}
	// untuk hapus
	public function hapus_admin(){
		$this->mo_res->hapus('tb_admin',array(
			'id' => $_GET['id']
		));
	}
}

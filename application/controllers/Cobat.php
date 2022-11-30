<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cobat extends CI_Controller {

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

	public function list_obat(){
		$data = $this->mo_res->getAll('tb_obat');
	
		echo json_encode($data);
	}
public function tambah_obat(){
		$nama = $_POST['nama'];
		$tipe = $_POST['tipe'];
		$jumlah = $_POST['jumlah'];
		$tgl_masuk = $_POST['tgl_masuk'];
		$tgl_kadaluarsa = $_POST['tgl_kadaluarsa'];

		$arr_input = array(
			'nama' => $nama,
			'tipe' => $tipe,
			'jumlah' => $jumlah,
			'tgl_masuk' => $tgl_masuk,
			'tgl_kadaluarsa' => $tgl_kadaluarsa,
		);

		$this->mo_res->input('tb_obat',$arr_input);
	}
	public function ambil_update(){
		$data = $this->mo_res->getWhere('tb_obat',array(
			'id' => $_GET['id']
		));

		echo json_encode($data);
	}
	//untuk mengupdate data
	public function simpan_update(){
		$this->mo_res->update('tb_obat',array(
			'nama' => $_POST['nama'],
			'tipe' => $_POST['tipe'],
			'jumlah' => $_POST['jumlah'],
			'tgl_masuk' => $_POST['tgl_masuk'],
			'tgl_kadaluarsa' => $_POST['tgl_kadaluarsa'],
		),array(
			'id' => $_POST['id']
		));
		
	}
	// untuk hapus
	public function hapus_obat(){
		$this->mo_res->hapus('tb_obat',array(
			'id' => $_GET['id']
		));
	}
}

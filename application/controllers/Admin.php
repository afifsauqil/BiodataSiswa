<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{ 
	public function index()
	{
		$data['judul'] = 'Halaman Beranda';
		$data['deskripsi'] = 'Silahkan kelola data siswa dengan';
		$data['tujuan'] = 'pada navbar management';
		$data['user'] = $this->db->get_where('user', ['name' => $this->session->userdata('name')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('dashboard/index', $data);
		$this->load->view('templates/footer');
	}
}
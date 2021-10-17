<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{ 
	public function index()
	{
		$data['judul'] = 'Halaman Beranda';
		$data['deskripsi'] = 'Silahkan masukkan biodata anda dengan';
		$user = $this->db->get_where('user', ['name' => $this->session->userdata('name')])->row_array();
		if($user['role_id'] == 1) {
			$data['tujuan'] = 'pada navbar management';
		} else {
			$data['tujuan'] = 'pada navbar profile';
		} 	
		$data['user'] = $this->db->get_where('user', ['name' => $this->session->userdata('name')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('dashboard/index', $data);
		$this->load->view('templates/footer');
	}

	public function profile()
	{
		$data['judul'] = 'Profile akun anda';
		$data['user'] = $this->db->get_where('user', ['name' => $this->session->userdata('name')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('user/profile', $data);
		$this->load->view('templates/footer');
	}

}
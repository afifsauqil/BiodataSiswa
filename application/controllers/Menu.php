<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller 
{ 
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Menu_model', 'menu');
	}

	public function index()
	{
		$data['judul'] = 'Menu Management';
		$data['user'] = $this->db->get_where('user', ['name' => $this->session->userdata('name')])->row_array();
		$data['siswa'] = $this->menu->getAllSiswa();

		// tampilan untuk pagination
		$data['siswa'] = $this->menu->getSiswa(5, 0);

		// PAGINATION
			$this->load->library('pagination');

		// ambil data keyword
			if($this->input->post('submit')) {
				$data['keyword'] = $this->input->post('keyword');
				$this->session->set_userdata('keyword', $data['keyword']);
			} else {
				$data['keyword'] = $this->session->userdata('keyword');
			}

		// config
			$this->db->like('nama', $data['keyword']);
			$this->db->from('siswa');
			$config['total_rows'] = $this->db->count_all_results();
			$data['total_rows'] = $config['total_rows'];
			$config['per_page'] = 5;

		// initialize
			$this->pagination->initialize($config);

			$data['start'] = $this->uri->segment(3);
			$data['siswa'] = $this->menu->getSiswa($config['per_page'], $data['start'], $data['keyword']);
		
		// kembali ke view
		$this->load->view('templates/header', $data);
		$this->load->view('menu/index', $data);
		$this->load->view('templates/footer');
	}

	public function addprofile()
	{
		$data['judul'] = 'Masukkan Biodata Anda';
		$data['user'] = $this->db->get_where('user', ['name' => $this->session->userdata('name')])->row_array();

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('nis', 'NIS', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$valid_foto = $this->form_validation->set_rules('foto', 'Foto', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('user/profile', $data);
			$this->load->view('templates/footer');
		} else {
			$this->menu->tambahDataSiswa();
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Biodata anda berhasil ditambahkan!</div>');
			redirect('user/profile');
		}

	}

	public function delete($id)
	{
		$this->menu->hapusDataSiswa($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
		redirect('menu');
	}

	public function detail($id)
	{
		$data['judul'] = 'Detail Data Siswa';
		$data['user'] = $this->db->get_where('user', ['name' => $this->session->userdata('name')])->row_array();
		$data['siswa'] = $this->menu->getSiswaById($id);

		$this->load->view('templates/header', $data);
		$this->load->view('menu/detail', $data);
		$this->load->view('templates/footer');
	}

	public function edit($id)
	{
		$data['judul'] = 'Form Ubah Data Siswa';
		$data['user'] = $this->db->get_where('user', ['name' => $this->session->userdata('name')])->row_array();
		$data['siswa'] = $this->menu->getSiswaById($id);
		$data['jurusan'] = ['Sistem Informatika Jaringan dan Aplikasi', 'Teknik Komputer dan Jaringan', 'Rekayasa Perangkat Lunak'];

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('nis', 'NIS', 'required|numeric');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');

		if($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('menu/edit', $data);
			$this->load->view('templates/footer');
		} else {
			$this->menu->ubahDataSiswa();
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Biodata siswa berhasil diubah!</div>');
			redirect('menu');
		}
	}

}
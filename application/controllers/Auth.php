<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
	public function index()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if($this->form_validation->run() == false) {
			$data['judul'] = 'Halaman Login';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('templates/auth_footer');	
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$name = $this->input->post('name');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['name' => $name])->row_array();
		
		// jika usernya ada
		if($user) {	
				// cek password
				if(password_verify($password, $user['password'])) {
					$data = [
						'name' => $user['name'],
						'role_id' => $user['role_id']
					];
					$this->session->set_userdata($data);
					if($user['role_id'] == 1) {
						redirect('admin');
					} else {
						redirect('user');
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
					redirect('auth');
				}

		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username tidak terdaftar! Mohon registrasi terlebih dahulu.</div>');
			redirect('auth');	
		}
	}

	public function register()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|trim|is_unique[user.name]', [
			'is_unique' => 'Username ini sudah terdaftar!'
		]);
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
			'is_unique' => 'Email ini sudah terdaftar!'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
				'matches' => 'password tidak sama!',
				'min_length' => 'password terlalu pendek!'
			]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if($this->form_validation->run() == false) {
			$data['judul'] = 'Halaman Registrasi';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/register');
			$this->load->view('templates/auth_footer');		
		} else {
			$data = [
				'name' => htmlspecialchars($this->input->post('name', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' => 2,
				'date_created' => time()
			];

			$this->db->insert('user', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! akun anda sudah terdaftar. Harap segera login!</div>');
			redirect('auth');
		}

	}



	public function logout()
	{
		$this->session->unset_userdata('name');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda telah logout!</div>');
			redirect('auth');
	}

}
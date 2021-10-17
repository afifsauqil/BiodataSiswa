<?php

class Menu_model extends CI_model 
{
	public function getAllSiswa()
	{
		return $this->db->get('siswa')->result_array();
	}
	
	// model untuk search dan pagination
	public function getSiswa($limit, $start, $keyword = null)
	{
		if($keyword) {
			$this->db->like('nama', $keyword);
		}
		return $this->db->get('siswa', $limit, $start)->result_array();
	}

	// model untuk CRUD data
	public function tambahDataSiswa()
	{
		$this->db->insert('siswa', [
				'nama' =>  $this->input->post('nama', true),
				'nis' =>  $this->input->post('nis', true),
				'email' =>  $this->input->post('email', true),
				'jurusan' =>  $this->input->post('jurusan', true),
				'foto' =>  $this->input->post('foto', true)
			]);
		
		$foto = $_FILES['foto'];
		if($foto='') {} else {
			$config['upload_path'] 	= './assets/img/profile';
			$config['allowed_types'] = 'jpg|png|gif';
			$config['max_width'] = 512;
			$config['max_height'] = 512;

			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('foto')) {
				
			} else {
				$foto = $this->upload->data('file_name');
				redirect('user/profile');
			}
		}
	}

	public function hapusDataSiswa($id)
	{
		// $this->db->where('id', $id);
		$this->db->delete('siswa', ['id' => $id]);
	}

	public function getSiswaById($id)
	{
			return $this->db->get_where('siswa', ['id' => $id])->row_array();
	}

	public function ubahDataSiswa()
	{
		$data = [
			"nama" => $this->input->post('nama', true),
			"nis" => $this->input->post('nis', true),
			"email" => $this->input->post('email', true),
			"jurusan" => $this->input->post('jurusan', true)
		];

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('siswa', $data);
	}
}
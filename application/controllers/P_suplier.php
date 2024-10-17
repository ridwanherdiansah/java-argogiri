<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class P_suplier extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('M_id');
	}

	public function T_suplier()
	{
		$nik = $this->input->post('nik');
		$nik = $this->db->get_where('suplier', ['nik' => $nik])->row_array();

		$id_suplier = $this->M_id->idsuplier();

		// cek nik
		if (!$nik) {
			
			$data_suplier = [
				
				'id'			=> null,
				'id_suplier'	=> $id_suplier,
				'nama'			=> $this->input->post('nama'),
				'jenis_suplier' => $this->input->post('jenis_suplier'),
				'nik' 			=> $this->input->post('nik'),
				'kk' 			=> $this->input->post('kk'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'email' 		=> $this->input->post('email'),
				'whatsapp'		=> $this->input->post('whatsapp'),
				'alamat' 		=> $this->input->post('alamat'),
				'kelompok'		=> $this->input->post('kelompok'),
				'luas_lahan' 	=> $this->input->post('luas_lahan'),
				'jumlah_pohon'	=> $this->input->post('jumlah_pohon'),
				'tanggal'		=> date('y/m/d')

			];

				// Insert data petani
				$this->db->insert('suplier',$data_suplier);

				$this->session->set_flashdata('message', 
						'<div class="alert alert-light-success color-success text-center"><i class="bi bi-check-circle"></i> Data suplier berhasil di simpan.</div>
					');

				redirect('Suplier/T_suplier');

		}else{

			$this->session->set_flashdata('message', 
						'<div class="alert alert-light-danger color-danger text-center"><i class="bi bi-exclamation-circle"></i> Nik yang di masukan sudah ada ! </div>
					');

			redirect('Suplier/T_suplier');
		}	

	}

	public function E_suplier($id_suplier)
	{
		$nik = $this->input->post('nik');
		$nik = $this->db->get_where('suplier', ['nik' => $nik])->row_array();

		$data_suplier_edit = [
				'nama'			=> $this->input->post('nama'),
				'jenis_suplier' => $this->input->post('jenis_suplier'),
				'nik' 			=> $this->input->post('nik'),
				'kk' 			=> $this->input->post('kk'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'email' 		=> $this->input->post('email'),
				'whatsapp'		=> $this->input->post('whatsapp'),
				'alamat' 		=> $this->input->post('alamat'),
				'kelompok'		=> $this->input->post('kelompok'),
				'luas_lahan' 	=> $this->input->post('luas_lahan'),
				'jumlah_pohon'	=> $this->input->post('jumlah_pohon')

			];

			// update data suplier
			$this->db->set('id_suplier', $id_suplier);
			$this->db->where('id_suplier', $id_suplier);
			$this->db->update('suplier', $data_suplier_edit);

			$this->session->set_flashdata('message', 
					'<div class="alert alert-light-success color-success text-center"><i class="bi bi-check-circle"></i> Data suplier berhasil di edit.</div>
				');

			redirect('Suplier/E_suplier/'.$id_suplier);

	}

	public function H_suplier($id_suplier)
	{
		$this->db->where('id_suplier', $id_suplier);
		$this->db->delete('suplier');

		$this->session->set_flashdata('message', 
						'<div class="alert alert-light-success color-success text-center"><i class="bi bi-exclamation-circle"></i> Data sudah di berhasi di hapus </div>');
		redirect('Suplier/T_suplier');
	}
}

// $this->cek->printr($data_suplier);
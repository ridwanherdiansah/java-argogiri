<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class P_buyers extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('M_id');
	}

	public function T_buyers()
	{
		$nik = $this->input->post('nik');
		$nik = $this->db->get_where('buyers', ['nik' => $nik])->row_array();

		$id_buyers = $this->M_id->idbuyers();

		// cek nik
		if (!$nik) {
			
			$data_buyers = [
				
				'id'			=> null,
				'id_buyers'		=> $id_buyers,
				'nama'			=> $this->input->post('nama'),
				'jenis_buyers' 	=> $this->input->post('jenis_buyers'),
				'nik' 			=> $this->input->post('nik'),
				'kk' 			=> $this->input->post('kk'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'email' 		=> $this->input->post('email'),
				'whatsapp'		=> $this->input->post('whatsapp'),
				'alamat' 		=> $this->input->post('alamat')

			];

				// Insert data buyers
				$this->db->insert('buyers',$data_buyers);

				$this->session->set_flashdata('message', 
						'<div class="alert alert-light-success color-success text-center"><i class="bi bi-check-circle"></i> Data buyers berhasil di simpan.</div>
					');

				redirect('Buyers/T_buyers');

		}else{

			$this->session->set_flashdata('message', 
						'<div class="alert alert-light-danger color-danger text-center"><i class="bi bi-exclamation-circle"></i> Nik yang di masukan sudah ada ! </div>
					');

			redirect('Buyers/T_buyers');
		}	

	}

	public function E_buyers($id_buyers)
	{
		$nik = $this->input->post('nik');
		$nik = $this->db->get_where('buyers', ['nik' => $nik])->row_array();

		$data_buyers_edit = [
				'nama'			=> $this->input->post('nama'),
				'jenis_buyers' 	=> $this->input->post('jenis_buyers'),
				'nik' 			=> $this->input->post('nik'),
				'kk' 			=> $this->input->post('kk'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'email' 		=> $this->input->post('email'),
				'whatsapp'		=> $this->input->post('whatsapp'),
				'alamat' 		=> $this->input->post('alamat')

			];

			// update data Buyer
			$this->db->set('id_buyers', $id_buyers);
			$this->db->where('id_buyers', $id_buyers);
			$this->db->update('buyers', $data_buyers_edit);

			$this->session->set_flashdata('message', 
					'<div class="alert alert-light-success color-success text-center"><i class="bi bi-check-circle"></i> Data buyers berhasil di edit.</div>
				');

			redirect('Buyers/E_buyers/'.$id_buyers);	

	}

	public function H_buyers($id_buyers)
	{
		$this->db->where('id_buyers', $id_buyers);
		$this->db->delete('buyers');

		$this->session->set_flashdata('message', 
						'<div class="alert alert-light-success color-success text-center"><i class="bi bi-exclamation-circle"></i> Data sudah di berhasil di hapus </div>');
		redirect('Buyers/T_buyers');
	}
}

// $this->library->printr($data_suplier);
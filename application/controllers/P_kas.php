<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class P_kas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('M_id');
	}

	public function T_kas()
	{
		$id_kas = $this->M_id->idkas();

		$data_kas = [
				'id'			=> null,
				'id_kas'		=> $id_kas,
				'nama'			=> $this->input->post('nama'),
				'saldo' 		=> $this->input->post('saldo'),
				'keterangan' 	=> $this->input->post('keterangan'),
				'status' 		=> $this->input->post('status'),
				'tanggal'		=> date("d-m-y")

			];
		
		// Insert data Kas
		$this->db->insert('kas',$data_kas);

		$this->session->set_flashdata('message', 
				'<div class="alert alert-light-success color-success text-center"><i class="bi bi-check-circle"></i> Saldo berhasil di tambahkan.</div>
			');

		redirect('Kas/Kas');
	}

	public function E_kas($id_kas)
	{

		$data_kas = [
				'nama'			=> $this->input->post('nama'),
				'saldo' 		=> $this->input->post('saldo'),
				'keterangan' 	=> $this->input->post('keterangan'),
				'status' 		=> $this->input->post('status'),
				'tanggal'		=> date("d-m-y")

			];
		
		// update data Kas
		$this->db->set('id_kas', $id_kas);
		$this->db->where('id_kas', $id_kas);
		$this->db->update('kas', $data_kas);

		$this->session->set_flashdata('message', 
				'<div class="alert alert-light-success color-success text-center"><i class="bi bi-check-circle"></i> Data kas berhasil di edit.</div>
			');

		redirect('Kas/Kas');
	}

	public function H_kas($id_kas)
	{
		$this->db->where('id_kas', $id_kas);
		$this->db->delete('kas');

		$this->session->set_flashdata('message', 
						'<div class="alert alert-light-success color-success text-center"><i class="bi bi-exclamation-circle"></i> Data sudah di berhasil di hapus </div>');
		redirect('Kas/Kas');
	}
}

// $this->library->printr($data_suplier);
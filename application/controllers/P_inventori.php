<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class P_inventori extends CI_Controller {

	public function T_inventori_ceri_gabah($id_inventori_ceri)
	{

		$update_gabah = [
				'gabah'	=> $this->input->post('gabah')

			];

			// update data gabah
			$this->db->set('id_inventori_ceri', $id_inventori_ceri);
			$this->db->where('id_inventori_ceri', $id_inventori_ceri);
			$this->db->update('inventori_ceri', $update_gabah);

			$this->session->set_flashdata('message', 
					'<div class="alert alert-light-success color-success text-center"><i class="bi bi-check-circle"></i> Data gabah berhasil di update.</div>
				');

			redirect('Inventori/T_ceri');
	}

	public function T_inventori_ceri_beras($id_inventori_ceri)
	{

		$update_beras = [
				'beras'	=> $this->input->post('beras')

			];

			// update data gabah
			$this->db->set('id_inventori_ceri', $id_inventori_ceri);
			$this->db->where('id_inventori_ceri', $id_inventori_ceri);
			$this->db->update('inventori_ceri', $update_beras);

			$this->session->set_flashdata('message', 
					'<div class="alert alert-light-success color-success text-center"><i class="bi bi-check-circle"></i> Data beras berhasil di update.</div>
				');

			redirect('Inventori/T_ceri');
	}

		public function T_inventori_gabah_beras($id_inventori_gabah)
	{

		$update_beras = [
				'beras'	=> $this->input->post('beras')

			];

			// update data gabah
			$this->db->set('id_inventori_gabah', $id_inventori_gabah);
			$this->db->where('id_inventori_gabah', $id_inventori_gabah);
			$this->db->update('inventori_gabah', $update_beras);

			$this->session->set_flashdata('message', 
					'<div class="alert alert-light-success color-success text-center"><i class="bi bi-check-circle"></i> Data beras berhasil di update.</div>
				');

			redirect('Inventori/T_gabah');
	}
}


		// $this->library->printr($id_inventori_ceri);
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suplier extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('M_id');
		$this->load->model('M_join');
	}

	public function T_suplier()
	{
		$data = array(
			'suplier' 			=> $suplier = $this->db->get_where('suplier')->result_array(),
			'jumlah_suplier' 	=> $jumlah_suplier = $this->db->get_where('suplier')->num_rows(),
		);

		$this->load->view('template/admin/header');
		$this->load->view('template/admin/topbar');
		$this->load->view('suplier/t_suplier', $data);
		$this->load->view('template/admin/footer');
	}

	public function L_suplier($id_suplier)
	{
		$jumlah_ceri			= $this->db->select('SUM(total_berat) AS jumlah_ceri')
									   ->from('pembelian')
									   ->where('pembelian.jenis_pembelian','Ceri')
									   ->where('pembelian.id_suplier',$id_suplier)
									   // ->where("YEAR(tanggal)={$tahun}")
									   ->get()
									   ->row();

	   $jumlah_gabah			= $this->db->select('SUM(total_berat) AS jumlah_gabah')
									   ->from('pembelian')
									   ->where('pembelian.jenis_pembelian','Gabah')
									   ->where('pembelian.id_suplier',$id_suplier)
									   // ->where("YEAR(tanggal)={$tahun}")
									   ->get()
									   ->row();

	   $jumlah_beras			= $this->db->select('SUM(total_berat) AS jumlah_beras')
									   ->from('pembelian')
									   ->where('pembelian.jenis_pembelian','Beras')
									   ->where('pembelian.id_suplier',$id_suplier)
									   // ->where("YEAR(tanggal)={$tahun}")
									   ->get()
									   ->row();

		$data = array(
			'suplier' 			=> $suplier = $this->db->get_where('suplier', ['id_suplier' => $id_suplier])->row_array(),
			'pembelian' 		=> $pembelian = $this->db->get_where('pembelian', ['id_suplier' => $id_suplier])->result_array(),
			'jumlah_ceri' 		=> $jumlah_ceri->jumlah_ceri,
			'jumlah_gabah' 		=> $jumlah_gabah->jumlah_gabah,
			'jumlah_beras' 		=> $jumlah_beras->jumlah_beras,
		);

		$this->load->view('template/admin/header');
		$this->load->view('template/admin/topbar');
		$this->load->view('suplier/L_suplier', $data);
		$this->load->view('template/admin/footer');
	}

	public function E_suplier($id_suplier)
	{
		$data = array(
			'suplier' 			=> $suplier = $this->db->get_where('suplier', ['id_suplier' => $id_suplier])->row_array(),
		);

		$this->load->view('template/admin/header');
		$this->load->view('template/admin/topbar');
		$this->load->view('suplier/E_suplier', $data);
		$this->load->view('template/admin/footer');
	}
}


// $this->library->printr($data);
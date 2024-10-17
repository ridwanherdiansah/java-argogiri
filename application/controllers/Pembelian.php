<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('M_id');
		$this->load->model('M_join');
	}

	public function T_pembelian()
	{
		$jumlah_ceri			= $this->db->select('SUM(total_berat) AS jumlah_ceri')
									   ->from('pembelian')
									   ->where('pembelian.jenis_pembelian','Ceri')
									   // ->where('pembelian.status','lunas')
									   // ->where("YEAR(tanggal)={$tahun}")
									   ->get()
									   ->row();

		$jumlah_gabah			= $this->db->select('SUM(total_berat) AS jumlah_gabah')
									   ->from('pembelian')
									   ->where('pembelian.jenis_pembelian','Gabah')
									   // ->where('pembelian.status','lunas')
									   // ->where("YEAR(tanggal)={$tahun}")
									   ->get()
									   ->row();

		$jumlah_beras			= $this->db->select('SUM(total_berat) AS jumlah_beras')
									   ->from('pembelian')
									   ->where('pembelian.jenis_pembelian','Beras')
									   // ->where('pembelian.status','lunas')
									   // ->where("YEAR(tanggal)={$tahun}")
									   ->get()
									   ->row();
									   
		$data = array(
			'jenis_pembelian' 	=> $jenis_pembelian = $this->db->get_where('jenis_pembelian')->result_array(),
			'jenis_kopi' 		=> $jenis_kopi = $this->db->get_where('jenis_kopi')->result_array(),
			'suplier' 			=> $suplier = $this->db->get_where('suplier')->result_array(),
			'pembelian' 		=> $pembelian = $this->db->get_where('pembelian')->result_array(),
			'jumlah_ceri' 		=> $jumlah_ceri->jumlah_ceri,
			'jumlah_gabah' 		=> $jumlah_gabah->jumlah_gabah,
			'jumlah_beras' 		=> $jumlah_beras->jumlah_beras,
		);

		$this->load->view('template/admin/header');
		$this->load->view('template/admin/topbar');
		$this->load->view('pembelian/t_pembelian', $data);
		$this->load->view('template/admin/footer');
	}

	public function Pembelian()
	{
		$data = array(
			'jenis_pembelian' 		=> $jenis_pembelian = $this->db->get_where('jenis_pembelian')->result_array(),
			'jenis_kopi' 			=> $jenis_kopi = $this->db->get_where('jenis_kopi')->result_array(),
			'suplier' 				=> $suplier = $this->db->get_where('suplier')->result_array(),
		);

		$this->load->view('template/admin/header');
		$this->load->view('template/admin/topbar');
		$this->load->view('pembelian/Pembelian', $data);
		$this->load->view('template/admin/footer');
	}

	public function L_pembelian($id_pembelian)
	{
		$data = array(
			'jenis_pembelian' 		=> $jenis_pembelian = $this->db->get_where('jenis_pembelian')->result_array(),
			'jenis_kopi' 			=> $jenis_kopi = $this->db->get_where('jenis_kopi')->result_array(),
			'suplier' 				=> $suplier = $this->db->get_where('suplier')->result_array(),
			'pembelian' 			=> $pembelian = $this->M_join->l_pembelian($id_pembelian),
		);
		
		$this->load->view('template/admin/header');
		$this->load->view('template/admin/topbar');
		$this->load->view('pembelian/L_pembelian', $data);
		$this->load->view('template/admin/footer');
	}
}

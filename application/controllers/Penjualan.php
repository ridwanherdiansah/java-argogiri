<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('M_id');
		$this->load->model('M_join');
	}

	public function T_penjualan()
	{

		$jumlah_ceri			= $this->db->select('SUM(berat) AS jumlah_ceri')
									   ->from('d_penjualan')
									   ->where('d_penjualan.jenis_penjualan','Ceri')
									   // ->where('pembelian.status','lunas')
									   // ->where("YEAR(tanggal)={$tahun}")
									   ->get()
									   ->row();

		$jumlah_gabah			= $this->db->select('SUM(berat) AS jumlah_gabah')
									   ->from('d_penjualan')
									   ->where('d_penjualan.jenis_penjualan','Gabah')
									   // ->where('pembelian.status','lunas')
									   // ->where("YEAR(tanggal)={$tahun}")
									   ->get()
									   ->row();

		$jumlah_beras			= $this->db->select('SUM(berat) AS jumlah_beras')
									   ->from('d_penjualan')
									   ->where('d_penjualan.jenis_penjualan','Beras')
									   // ->where('pembelian.status','lunas')
									   // ->where("YEAR(tanggal)={$tahun}")
									   ->get()
									   ->row();

		// $jumlah_ceri			= $this->db->select('SUM(berat) AS jumlah_ceri')
		// 							   ->from('d_penjualan')
		// 							   ->where('d_penjualan.jenis_penjualan','Ceri')
		// 							   // ->where('penjualan.status','lunas')
		// 							   ->join("penjualan","penjualan.id_penjualan = d_penjualan.id_penjualan","LEFT")
		// 							   // ->where("YEAR(tanggal)={$tahun}")
		// 							   ->get()
		// 							   ->row();

	 //   $jumlah_gabah			= $this->db->select('SUM(berat) AS jumlah_gabah')
		// 							   ->from('d_penjualan')
		// 							   ->where('d_penjualan.jenis_penjualan','Gabah')
		// 							   // ->where('penjualan.status','lunas')
		// 							   ->join("penjualan","penjualan.id_penjualan = d_penjualan.id_penjualan","LEFT")
		// 							   // ->where("YEAR(tanggal)={$tahun}")
		// 							   ->get()
		// 							   ->row();

	 //   $jumlah_beras			= $this->db->select('SUM(berat) AS jumlah_beras')
		// 							   ->from('d_penjualan')
		// 							   ->where('d_penjualan.jenis_penjualan','Beras')
		// 							   // ->where('penjualan.status','lunas')
		// 							   ->join("penjualan","penjualan.id_penjualan = d_penjualan.id_penjualan","LEFT")
		// 							   // ->where("YEAR(tanggal)={$tahun}")
		// 							   ->get()
		// 							   ->row();

		$data = array(
			'penjualan' 		=> $penjualan = $this->db->get_where('penjualan')->result_array(),
			'jumlah_ceri' 		=> $jumlah_ceri->jumlah_ceri,
			'jumlah_gabah' 		=> $jumlah_gabah->jumlah_gabah,
			'jumlah_beras' 		=> $jumlah_beras->jumlah_beras,
		);

		$this->load->view('template/admin/header');
		$this->load->view('template/admin/topbar');
		$this->load->view('penjualan/t_penjualan', $data);
		$this->load->view('template/admin/footer');
	}

	public function Penjualan()
	{
		$data = array(
			'jenis_pembelian' 		=> $jenis_pembelian = $this->db->get_where('jenis_pembelian')->result_array(),
			'jenis_kopi' 			=> $jenis_kopi = $this->db->get_where('jenis_kopi')->result_array(),
			'buyers' 				=> $buyers = $this->db->get_where('buyers')->result_array(),
		);

		$this->load->view('template/admin/header');
		$this->load->view('template/admin/topbar');
		$this->load->view('penjualan/Penjualan', $data);
		$this->load->view('template/admin/footer');
	}

	public function L_penjualan($id_penjualan)
	{
		$data = array(
			'jenis_pembelian' 		=> $jenis_pembelian = $this->db->get_where('jenis_pembelian')->result_array(),
			'jenis_kopi' 			=> $jenis_kopi = $this->db->get_where('jenis_kopi')->result_array(),
			'buyers' 				=> $buyers = $this->db->get_where('buyers')->result_array(),
			'surat_jalan' 			=> $surat_jalan = $this->db->get_where('surat_jalan', ['id_penjualan' => $id_penjualan])->row_array(),
			'penjualan' 			=> $penjualan = $this->M_join->l_penjualan($id_penjualan),
		);

		$this->load->view('template/admin/header');
		$this->load->view('template/admin/topbar');
		$this->load->view('penjualan/L_penjualan', $data);
		$this->load->view('template/admin/footer');
	}
}

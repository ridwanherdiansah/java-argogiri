<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Piutang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('M_id');
		$this->load->model('M_join');
	}

	public function T_pembelian()
	{
		$jumlah_ceri			= $this->db->select('SUM(berat) AS jumlah_ceri')
									   ->from('d_pembelian')
									   ->where('d_pembelian.jenis_pembelian','ceri')
									   ->where('pembelian.status','belum_lunas')
									   ->join("pembelian","pembelian.id_pembelian = d_pembelian.id_pembelian","LEFT")

									   // ->where("YEAR(tanggal)={$tahun}")
									   ->get()
									   ->row();

	   $jumlah_gabah			= $this->db->select('SUM(berat) AS jumlah_gabah')
									   ->from('d_pembelian')
									   ->where('d_pembelian.jenis_pembelian','gabah')
									   ->where('pembelian.status','belum_lunas')
									   ->join("pembelian","pembelian.id_pembelian = d_pembelian.id_pembelian","LEFT")
									   // ->where("YEAR(tanggal)={$tahun}")
									   ->get()
									   ->row();

	   $jumlah_beras			= $this->db->select('SUM(berat) AS jumlah_beras')
									   ->from('d_pembelian')
									   ->where('d_pembelian.jenis_pembelian','beras')
									   ->where('pembelian.status','belum_lunas')
									   ->join("pembelian","pembelian.id_pembelian = d_pembelian.id_pembelian","LEFT")
									   // ->where("YEAR(tanggal)={$tahun}")
									   ->get()
									   ->row();

		$status = 'belum_lunas';
		$data = array(
			'pembelian' 			=> $pembelian = $this->db->get_where('pembelian', ['status' => $status])->result_array(),
			'jumlah_ceri' 		=> $jumlah_ceri->jumlah_ceri,
			'jumlah_gabah' 		=> $jumlah_gabah->jumlah_gabah,
			'jumlah_beras' 		=> $jumlah_beras->jumlah_beras,
		);

		$this->load->view('template/admin/header');
		$this->load->view('template/admin/topbar');
		$this->load->view('piutang/T_pembelian', $data);
		$this->load->view('template/admin/footer');
	}

	public function T_penjualan()
	{

		$jumlah_ceri			= $this->db->select('SUM(berat) AS jumlah_ceri')
									   ->from('d_penjualan')
									   ->where('d_penjualan.jenis_penjualan','ceri')
									   ->where('penjualan.status','belum_lunas')
									   ->join("penjualan","penjualan.id_penjualan = d_penjualan.id_penjualan","LEFT")

									   // ->where("YEAR(tanggal)={$tahun}")
									   ->get()
									   ->row();

	   $jumlah_gabah			= $this->db->select('SUM(berat) AS jumlah_gabah')
									   ->from('d_penjualan')
									   ->where('d_penjualan.jenis_penjualan','gabah')
									   ->where('penjualan.status','belum_lunas')
									   ->join("penjualan","penjualan.id_penjualan = d_penjualan.id_penjualan","LEFT")
									   // ->where("YEAR(tanggal)={$tahun}")
									   ->get()
									   ->row();

	   $jumlah_beras			= $this->db->select('SUM(berat) AS jumlah_beras')
									   ->from('d_penjualan')
									   ->where('d_penjualan.jenis_penjualan','beras')
									   ->where('penjualan.status','belum_lunas')
									   ->join("penjualan","penjualan.id_penjualan = d_penjualan.id_penjualan","LEFT")
									   // ->where("YEAR(tanggal)={$tahun}")
									   ->get()
									   ->row();
		$status = 'belum_lunas';
		$data = array(
			'penjualan' 		=> $penjualan = $this->db->get_where('penjualan', ['status' => $status])->result_array(),
			'jumlah_ceri' 		=> $jumlah_ceri->jumlah_ceri,
			'jumlah_gabah' 		=> $jumlah_gabah->jumlah_gabah,
			'jumlah_beras' 		=> $jumlah_beras->jumlah_beras,
		);

		$this->load->view('template/admin/header');
		$this->load->view('template/admin/topbar');
		$this->load->view('piutang/t_penjualan', $data);
		$this->load->view('template/admin/footer');
	}
}


// $this->library->printr($data);
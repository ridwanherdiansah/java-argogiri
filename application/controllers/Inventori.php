<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventori extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('M_id');
	}

	public function T_ceri()
	{
		$jumlah_inventori_ceri_arabika	= $this->db->select('SUM(ceri) AS jumlah_inventori_ceri_arabika')
									   ->from('inventori_ceri')
									   ->where('inventori_ceri.gabah = ',0)
									   ->where('inventori_ceri.jenis_kopi = ','arabika')
									   // ->where("YEAR(tanggal)={$tahun}")
									   ->get()
									   ->row();

	$jumlah_d_penjualan_ceri_arabika	= $this->db->select('SUM(berat) AS jumlah_d_penjualan_ceri_arabika')
									   ->from('d_penjualan')
									   ->where('d_penjualan.jenis_kopi = ','arabika')
									   ->where('d_penjualan.jenis_penjualan = ','ceri')
									   // ->where("YEAR(tanggal)={$tahun}")
									   ->get()
									   ->row();

$ceri_arabika = $jumlah_inventori_ceri_arabika->jumlah_inventori_ceri_arabika-$jumlah_d_penjualan_ceri_arabika->jumlah_d_penjualan_ceri_arabika;

	$jumlah_inventori_ceri_robusta	= $this->db->select('SUM(ceri) AS jumlah_inventori_ceri_robusta')
									   ->from('inventori_ceri')
									   ->where('inventori_ceri.gabah = ',0)
									   ->where('inventori_ceri.jenis_kopi = ','robusta')
									   // ->where("YEAR(tanggal)={$tahun}")
									   ->get()
									   ->row();

	$jumlah_d_penjualan_ceri_robusta	= $this->db->select('SUM(berat) AS jumlah_d_penjualan_ceri_robusta')
									   ->from('d_penjualan')
									   ->where('d_penjualan.jenis_kopi = ','robusta')
									   ->where('d_penjualan.jenis_penjualan = ','gabah')
									   // ->where("YEAR(tanggal)={$tahun}")
									   ->get()
									   ->row();

$ceri_robusta = $jumlah_d_penjualan_ceri_robusta->jumlah_d_penjualan_ceri_robusta-$jumlah_d_penjualan_ceri_robusta->jumlah_d_penjualan_ceri_robusta;

	$jumlah_inventori_ceri_gabah_arabika	= $this->db->select('SUM(gabah) AS jumlah_inventori_ceri_gabah_arabika')
									   ->from('inventori_ceri')
									   ->where('inventori_ceri.beras = ',0)
									   ->where('inventori_ceri.jenis_kopi = ','arabika')
									   // ->where("YEAR(tanggal)={$tahun}")
									   ->get()
									   ->row();

	$jumlah_inventori_gabah_gabah_arabika	= $this->db->select('SUM(gabah) AS jumlah_inventori_gabah_gabah_arabika')
									   ->from('inventori_gabah')
									   ->where('inventori_gabah.beras = ',0)
									   ->where('inventori_gabah.jenis_kopi = ','arabika')
									   // ->where("YEAR(tanggal)={$tahun}")
									   ->get()
									   ->row();

	$jumlah_d_penjualan_gabah_arabika	= $this->db->select('SUM(berat) AS jumlah_d_penjualan_gabah_arabika')
									   ->from('d_penjualan')
									   ->where('d_penjualan.jenis_kopi = ','arabika')
									   ->where('d_penjualan.jenis_penjualan = ','gabah')
									   // ->where("YEAR(tanggal)={$tahun}")
									   ->get()
									   ->row();
	
	$gabah_arabika = ($jumlah_inventori_ceri_gabah_arabika->jumlah_inventori_ceri_gabah_arabika+$jumlah_inventori_gabah_gabah_arabika->jumlah_inventori_gabah_gabah_arabika)-$jumlah_d_penjualan_gabah_arabika->jumlah_d_penjualan_gabah_arabika;

	$jumlah_inventori_ceri_gabah_robusta	= $this->db->select('SUM(gabah) AS jumlah_inventori_ceri_gabah_robusta')
									   ->from('inventori_ceri')
									   ->where('inventori_ceri.beras = ',0)
									   ->where('inventori_ceri.jenis_kopi = ','robusta')
									   // ->where("YEAR(tanggal)={$tahun}")
									   ->get()
									   ->row();

	$jumlah_inventori_gabah_gabah_robusta	= $this->db->select('SUM(gabah) AS jumlah_inventori_gabah_gabah_robusta')
									   ->from('inventori_gabah')
									   ->where('inventori_gabah.beras = ',0)
									   ->where('inventori_gabah.jenis_kopi = ','robusta')
									   // ->where("YEAR(tanggal)={$tahun}")
									   ->get()
									   ->row();

	$jumlah_d_penjualan_gabah_robusta	= $this->db->select('SUM(berat) AS jumlah_d_penjualan_gabah_robusta')
									   ->from('d_penjualan')
									   ->where('d_penjualan.jenis_kopi = ','robusta')
									   ->where('d_penjualan.jenis_penjualan = ','gabah')
									   // ->where("YEAR(tanggal)={$tahun}")
									   ->get()
									   ->row();
	
	$gabah_robusta = ($jumlah_inventori_ceri_gabah_robusta->jumlah_inventori_ceri_gabah_robusta+$jumlah_inventori_gabah_gabah_robusta->jumlah_inventori_gabah_gabah_robusta)-$jumlah_d_penjualan_gabah_robusta->jumlah_d_penjualan_gabah_robusta;

	$pembelian_beras_arabika	= $this->db->select('SUM(total_berat) AS pembelian_beras_arabika')
									   ->from('pembelian')
									   ->where('pembelian.jenis_pembelian = ','Beras')
									   ->where('pembelian.jenis_kopi = ','arabika')
									   // ->where("YEAR(tanggal)={$tahun}")
									   ->get()
									   ->row();

	$jumlah_inventori_ceri_beras_arabika	= $this->db->select('SUM(beras) AS jumlah_inventori_ceri_beras_arabika')
									   ->from('inventori_ceri')
									   ->where('inventori_ceri.beras != ',0)
									   ->where('inventori_ceri.jenis_kopi = ','arabika')
									   // ->where("YEAR(tanggal)={$tahun}")
									   ->get()
									   ->row();

	$jumlah_inventori_gabah_beras_arabika	= $this->db->select('SUM(beras) AS jumlah_inventori_gabah_beras_arabika')
									   ->from('inventori_gabah')
									   ->where('inventori_gabah.beras != ',0)
									   ->where('inventori_gabah.jenis_kopi = ','arabika')
									   // ->where("YEAR(tanggal)={$tahun}")
									   ->get()
									   ->row();

	$jumlah_d_penjualan_beras_arabika	= $this->db->select('SUM(berat) AS jumlah_d_penjualan_beras_arabika')
									   ->from('d_penjualan')
									   ->where('d_penjualan.jenis_kopi = ','arabika')
									   ->where('d_penjualan.jenis_penjualan = ','beras')
									   // ->where("YEAR(tanggal)={$tahun}")
									   ->get()
									   ->row();
	
	$beras_arabika = ($jumlah_inventori_ceri_beras_arabika->jumlah_inventori_ceri_beras_arabika+$jumlah_inventori_gabah_beras_arabika->jumlah_inventori_gabah_beras_arabika+$pembelian_beras_arabika->pembelian_beras_arabika)-$jumlah_d_penjualan_beras_arabika->jumlah_d_penjualan_beras_arabika;

	$pembelian_beras_robusta	= $this->db->select('SUM(total_berat) AS pembelian_beras_robusta')
									   ->from('pembelian')
									   ->where('pembelian.jenis_pembelian = ','Beras')
									   ->where('pembelian.jenis_kopi = ','robusta')
									   // ->where("YEAR(tanggal)={$tahun}")
									   ->get()
									   ->row();

	$jumlah_inventori_ceri_beras_robusta	= $this->db->select('SUM(beras) AS jumlah_inventori_ceri_beras_robusta')
									   ->from('inventori_ceri')
									   ->where('inventori_ceri.beras != ',0)
									   ->where('inventori_ceri.jenis_kopi = ','robusta')
									   // ->where("YEAR(tanggal)={$tahun}")
									   ->get()
									   ->row();

	$jumlah_inventori_gabah_beras_robusta	= $this->db->select('SUM(beras) AS jumlah_inventori_gabah_beras_robusta')
									   ->from('inventori_gabah')
									   ->where('inventori_gabah.beras != ',0)
									   ->where('inventori_gabah.jenis_kopi = ','robusta')
									   // ->where("YEAR(tanggal)={$tahun}")
									   ->get()
									   ->row();

	$jumlah_d_penjualan_beras_robusta	= $this->db->select('SUM(berat) AS jumlah_d_penjualan_beras_robusta')
									   ->from('d_penjualan')
									   ->where('d_penjualan.jenis_kopi = ','robusta')
									   ->where('d_penjualan.jenis_penjualan = ','beras')
									   // ->where("YEAR(tanggal)={$tahun}")
									   ->get()
									   ->row();
	
	$beras_robusta = ($jumlah_inventori_ceri_beras_robusta->jumlah_inventori_ceri_beras_robusta+$jumlah_inventori_gabah_beras_robusta->jumlah_inventori_gabah_beras_robusta+$pembelian_beras_robusta->pembelian_beras_robusta)-$jumlah_d_penjualan_beras_robusta->jumlah_d_penjualan_beras_robusta;

		$data = array(
			'inventori_ceri' 	=> $inventori_ceri = $this->db->get_where('inventori_ceri')->result_array(),
			'jumlah_ceri'		=> $ceri_arabika+$ceri_robusta,
			'jumlah_gabah'		=> $gabah_arabika+$gabah_robusta,
			'jumlah_beras'		=> $beras_arabika+$beras_robusta,		
		);

		$this->load->view('template/admin/header');
		$this->load->view('template/admin/topbar');
		$this->load->view('inventori/T_inventori_ceri', $data);
		$this->load->view('template/admin/footer');
	}

	public function T_gabah()
	{
		$jumlah_inventori_ceri_arabika	= $this->db->select('SUM(ceri) AS jumlah_inventori_ceri_arabika')
									   ->from('inventori_ceri')
									   ->where('inventori_ceri.gabah = ',0)
									   ->where('inventori_ceri.jenis_kopi = ','arabika')
									   // ->where("YEAR(tanggal)={$tahun}")
									   ->get()
									   ->row();

	$jumlah_d_penjualan_ceri_arabika	= $this->db->select('SUM(berat) AS jumlah_d_penjualan_ceri_arabika')
									   ->from('d_penjualan')
									   ->where('d_penjualan.jenis_kopi = ','arabika')
									   ->where('d_penjualan.jenis_penjualan = ','ceri')
									   // ->where("YEAR(tanggal)={$tahun}")
									   ->get()
									   ->row();

$ceri_arabika = $jumlah_inventori_ceri_arabika->jumlah_inventori_ceri_arabika-$jumlah_d_penjualan_ceri_arabika->jumlah_d_penjualan_ceri_arabika;

	$jumlah_inventori_ceri_robusta	= $this->db->select('SUM(ceri) AS jumlah_inventori_ceri_robusta')
									   ->from('inventori_ceri')
									   ->where('inventori_ceri.gabah = ',0)
									   ->where('inventori_ceri.jenis_kopi = ','robusta')
									   // ->where("YEAR(tanggal)={$tahun}")
									   ->get()
									   ->row();

	$jumlah_d_penjualan_ceri_robusta	= $this->db->select('SUM(berat) AS jumlah_d_penjualan_ceri_robusta')
									   ->from('d_penjualan')
									   ->where('d_penjualan.jenis_kopi = ','robusta')
									   ->where('d_penjualan.jenis_penjualan = ','gabah')
									   // ->where("YEAR(tanggal)={$tahun}")
									   ->get()
									   ->row();

$ceri_robusta = $jumlah_d_penjualan_ceri_robusta->jumlah_d_penjualan_ceri_robusta-$jumlah_d_penjualan_ceri_robusta->jumlah_d_penjualan_ceri_robusta;

	$jumlah_inventori_ceri_gabah_arabika	= $this->db->select('SUM(gabah) AS jumlah_inventori_ceri_gabah_arabika')
									   ->from('inventori_ceri')
									   ->where('inventori_ceri.beras = ',0)
									   ->where('inventori_ceri.jenis_kopi = ','arabika')
									   // ->where("YEAR(tanggal)={$tahun}")
									   ->get()
									   ->row();

	$jumlah_inventori_gabah_gabah_arabika	= $this->db->select('SUM(gabah) AS jumlah_inventori_gabah_gabah_arabika')
									   ->from('inventori_gabah')
									   ->where('inventori_gabah.beras = ',0)
									   ->where('inventori_gabah.jenis_kopi = ','arabika')
									   // ->where("YEAR(tanggal)={$tahun}")
									   ->get()
									   ->row();

	$jumlah_d_penjualan_gabah_arabika	= $this->db->select('SUM(berat) AS jumlah_d_penjualan_gabah_arabika')
									   ->from('d_penjualan')
									   ->where('d_penjualan.jenis_kopi = ','arabika')
									   ->where('d_penjualan.jenis_penjualan = ','gabah')
									   // ->where("YEAR(tanggal)={$tahun}")
									   ->get()
									   ->row();
	
	$gabah_arabika = ($jumlah_inventori_ceri_gabah_arabika->jumlah_inventori_ceri_gabah_arabika+$jumlah_inventori_gabah_gabah_arabika->jumlah_inventori_gabah_gabah_arabika)-$jumlah_d_penjualan_gabah_arabika->jumlah_d_penjualan_gabah_arabika;

	$jumlah_inventori_ceri_gabah_robusta	= $this->db->select('SUM(gabah) AS jumlah_inventori_ceri_gabah_robusta')
									   ->from('inventori_ceri')
									   ->where('inventori_ceri.beras = ',0)
									   ->where('inventori_ceri.jenis_kopi = ','robusta')
									   // ->where("YEAR(tanggal)={$tahun}")
									   ->get()
									   ->row();

	$jumlah_inventori_gabah_gabah_robusta	= $this->db->select('SUM(gabah) AS jumlah_inventori_gabah_gabah_robusta')
									   ->from('inventori_gabah')
									   ->where('inventori_gabah.beras = ',0)
									   ->where('inventori_gabah.jenis_kopi = ','robusta')
									   // ->where("YEAR(tanggal)={$tahun}")
									   ->get()
									   ->row();

	$jumlah_d_penjualan_gabah_robusta	= $this->db->select('SUM(berat) AS jumlah_d_penjualan_gabah_robusta')
									   ->from('d_penjualan')
									   ->where('d_penjualan.jenis_kopi = ','robusta')
									   ->where('d_penjualan.jenis_penjualan = ','gabah')
									   // ->where("YEAR(tanggal)={$tahun}")
									   ->get()
									   ->row();
	
	$gabah_robusta = ($jumlah_inventori_ceri_gabah_robusta->jumlah_inventori_ceri_gabah_robusta+$jumlah_inventori_gabah_gabah_robusta->jumlah_inventori_gabah_gabah_robusta)-$jumlah_d_penjualan_gabah_robusta->jumlah_d_penjualan_gabah_robusta;

	$pembelian_beras_arabika	= $this->db->select('SUM(total_berat) AS pembelian_beras_arabika')
									   ->from('pembelian')
									   ->where('pembelian.jenis_pembelian = ','Beras')
									   ->where('pembelian.jenis_kopi = ','arabika')
									   // ->where("YEAR(tanggal)={$tahun}")
									   ->get()
									   ->row();

	$jumlah_inventori_ceri_beras_arabika	= $this->db->select('SUM(beras) AS jumlah_inventori_ceri_beras_arabika')
									   ->from('inventori_ceri')
									   ->where('inventori_ceri.beras != ',0)
									   ->where('inventori_ceri.jenis_kopi = ','arabika')
									   // ->where("YEAR(tanggal)={$tahun}")
									   ->get()
									   ->row();

	$jumlah_inventori_gabah_beras_arabika	= $this->db->select('SUM(beras) AS jumlah_inventori_gabah_beras_arabika')
									   ->from('inventori_gabah')
									   ->where('inventori_gabah.beras != ',0)
									   ->where('inventori_gabah.jenis_kopi = ','arabika')
									   // ->where("YEAR(tanggal)={$tahun}")
									   ->get()
									   ->row();

	$jumlah_d_penjualan_beras_arabika	= $this->db->select('SUM(berat) AS jumlah_d_penjualan_beras_arabika')
									   ->from('d_penjualan')
									   ->where('d_penjualan.jenis_kopi = ','arabika')
									   ->where('d_penjualan.jenis_penjualan = ','beras')
									   // ->where("YEAR(tanggal)={$tahun}")
									   ->get()
									   ->row();
	
	$beras_arabika = ($jumlah_inventori_ceri_beras_arabika->jumlah_inventori_ceri_beras_arabika+$jumlah_inventori_gabah_beras_arabika->jumlah_inventori_gabah_beras_arabika+$pembelian_beras_arabika->pembelian_beras_arabika)-$jumlah_d_penjualan_beras_arabika->jumlah_d_penjualan_beras_arabika;

	$pembelian_beras_robusta	= $this->db->select('SUM(total_berat) AS pembelian_beras_robusta')
									   ->from('pembelian')
									   ->where('pembelian.jenis_pembelian = ','Beras')
									   ->where('pembelian.jenis_kopi = ','robusta')
									   // ->where("YEAR(tanggal)={$tahun}")
									   ->get()
									   ->row();

	$jumlah_inventori_ceri_beras_robusta	= $this->db->select('SUM(beras) AS jumlah_inventori_ceri_beras_robusta')
									   ->from('inventori_ceri')
									   ->where('inventori_ceri.beras != ',0)
									   ->where('inventori_ceri.jenis_kopi = ','robusta')
									   // ->where("YEAR(tanggal)={$tahun}")
									   ->get()
									   ->row();

	$jumlah_inventori_gabah_beras_robusta	= $this->db->select('SUM(beras) AS jumlah_inventori_gabah_beras_robusta')
									   ->from('inventori_gabah')
									   ->where('inventori_gabah.beras != ',0)
									   ->where('inventori_gabah.jenis_kopi = ','robusta')
									   // ->where("YEAR(tanggal)={$tahun}")
									   ->get()
									   ->row();

	$jumlah_d_penjualan_beras_robusta	= $this->db->select('SUM(berat) AS jumlah_d_penjualan_beras_robusta')
									   ->from('d_penjualan')
									   ->where('d_penjualan.jenis_kopi = ','robusta')
									   ->where('d_penjualan.jenis_penjualan = ','beras')
									   // ->where("YEAR(tanggal)={$tahun}")
									   ->get()
									   ->row();
	
	$beras_robusta = ($jumlah_inventori_ceri_beras_robusta->jumlah_inventori_ceri_beras_robusta+$jumlah_inventori_gabah_beras_robusta->jumlah_inventori_gabah_beras_robusta+$pembelian_beras_robusta->pembelian_beras_robusta)-$jumlah_d_penjualan_beras_robusta->jumlah_d_penjualan_beras_robusta;

		$data = array(
			'inventori_gabah' 	=> $inventori_gabah = $this->db->get_where('inventori_gabah')->result_array(),
			'jumlah_ceri'		=> $ceri_arabika+$ceri_robusta,
			'jumlah_gabah'		=> $gabah_arabika+$gabah_robusta,
			'jumlah_beras'		=> $beras_arabika+$beras_robusta,	
		);

		$this->load->view('template/admin/header');
		$this->load->view('template/admin/topbar');
		$this->load->view('inventori/T_inventori_gabah', $data);
		$this->load->view('template/admin/footer');
	}

	public function L_buyers($id_buyers)
	{
		$jumlah_ceri			= $this->db->select('SUM(berat) AS jumlah_ceri')
									   ->from('d_penjualan')
									   ->where('d_penjualan.jenis_penjualan','ceri')
									   ->where('d_penjualan.jenis_penjualan','ceri')
									   ->where('penjualan.id_buyers',$id_buyers)
									   ->join("penjualan","penjualan.id_penjualan = d_penjualan.id_penjualan","LEFT")

									   // ->where("YEAR(tanggal)={$tahun}")
									   ->get()
									   ->row();

	   $jumlah_gabah			= $this->db->select('SUM(berat) AS jumlah_gabah')
									   ->from('d_penjualan')
									   ->where('d_penjualan.jenis_penjualan','gabah')
									   ->where('d_penjualan.jenis_penjualan','ceri')
									   ->where('penjualan.id_buyers',$id_buyers)
									   ->join("penjualan","penjualan.id_penjualan = d_penjualan.id_penjualan","LEFT")
									   // ->where("YEAR(tanggal)={$tahun}")
									   ->get()
									   ->row();

	   $jumlah_beras			= $this->db->select('SUM(berat) AS jumlah_beras')
									   ->from('d_penjualan')
									   ->where('d_penjualan.jenis_penjualan','beras')
									   ->where('d_penjualan.jenis_penjualan','ceri')
									   ->where('penjualan.id_buyers',$id_buyers)
									   ->join("penjualan","penjualan.id_penjualan = d_penjualan.id_penjualan","LEFT")
									   // ->where("YEAR(tanggal)={$tahun}")
									   ->get()
									   ->row();

		$data = array(
			'buyers' 			=> $buyers = $this->db->get_where('buyers', ['id_buyers' => $id_buyers])->row_array(),
			'penjualan' 		=> $penjualan = $this->db->get_where('penjualan', ['id_buyers' => $id_buyers])->result_array(),
			'jumlah_ceri' 		=> $jumlah_ceri->jumlah_ceri,
			'jumlah_gabah' 		=> $jumlah_gabah->jumlah_gabah,
			'jumlah_beras' 		=> $jumlah_beras->jumlah_beras,
		);

		$this->load->view('template/admin/header');
		$this->load->view('template/admin/topbar');
		$this->load->view('buyers/L_buyers', $data);
		$this->load->view('template/admin/footer');
	}

	public function E_buyers($id_buyers)
	{
		$data = array(
			'buyers' 			=> $buyers = $this->db->get_where('buyers', ['id_buyers' => $id_buyers])->row_array(),
		);

		$this->load->view('template/admin/header');
		$this->load->view('template/admin/topbar');
		$this->load->view('buyers/E_buyers', $data);
		$this->load->view('template/admin/footer');
	}
}

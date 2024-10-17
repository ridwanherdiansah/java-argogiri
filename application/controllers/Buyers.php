<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buyers extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('M_id');
	}

	public function T_buyers()
	{
		$data = array(
			'buyers' 			=> $buyers = $this->db->get_where('buyers')->result_array(),
			'jumlah_buyers' 	=> $jumlah_buyers = $this->db->get_where('buyers')->num_rows(),
		);

		$this->load->view('template/admin/header');
		$this->load->view('template/admin/topbar');
		$this->load->view('buyers/T_buyers', $data);
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

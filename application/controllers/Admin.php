<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function Dashboard()
	{
		$tahun 		=date('Y');

		$jumlah_suplier		= $this->db->select('*')
									   ->from('suplier')
									   // ->where("YEAR(tanggal)={$tahun}")
									   ->get()
									   ->num_rows();

	   $jumlah_pembelian		= $this->db->select('*')
									   ->from('pembelian')
									   ->where('pembelian.status','lunas')
									   // ->where("YEAR(tanggal)={$tahun}")
									   ->get()
									   ->num_rows();

	   $jumlah_penjualan		= $this->db->select('*')
									   ->from('penjualan')
									   ->where('penjualan.status','lunas')
									   // ->where("YEAR(tanggal)={$tahun}")
									   ->get()
									   ->num_rows();

		$stok					= $this->db->select('SUM(berat) AS stok')
									   ->from('d_pembelian')
									   // ->where('d_pembelian.jenis_pembelian','gabah')
									   // ->where("YEAR(tanggal)={$tahun}")
									   ->get()
									   ->row();

		$jumlah_ceri			= $this->db->select('SUM(berat) AS jumlah_ceri')
									   ->from('d_pembelian')
									   ->where('d_pembelian.jenis_pembelian','ceri')
									   // ->where("YEAR(tanggal)={$tahun}")
									   ->get()
									   ->row();

	   $jumlah_gabah			= $this->db->select('SUM(berat) AS jumlah_gabah')
									   ->from('d_pembelian')
									   ->where('d_pembelian.jenis_pembelian','gabah')
									   // ->where("YEAR(tanggal)={$tahun}")
									   ->get()
									   ->row();

	   $jumlah_beras			= $this->db->select('SUM(berat) AS jumlah_beras')
									   ->from('d_pembelian')
									   ->where('d_pembelian.jenis_pembelian','beras')
									   // ->where("YEAR(tanggal)={$tahun}")
									   ->get()
									   ->row();

		$data = array(
			'jumlah_suplier' 	=> $jumlah_suplier,
			'jumlah_pembelian' 	=> $jumlah_pembelian,
			'jumlah_penjualan' 	=> $jumlah_penjualan,
			'stok' 				=> $stok->stok,
			'jumlah_ceri' 		=> $jumlah_ceri->jumlah_ceri,
			'jumlah_gabah' 		=> $jumlah_gabah->jumlah_gabah,
			'jumlah_beras' 		=> $jumlah_beras->jumlah_beras,
				
		);

		$this->load->view('template/admin/header');
		$this->load->view('template/admin/topbar');
		$this->load->view('admin/dashboard', $data);
		$this->load->view('template/admin/footer');
	}
}


// $this->library->printr($data);
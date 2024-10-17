<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class P_penjualan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('M_id');
	}

	public function T_keranjang()
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

	$pembelian_beras_arabika			= $this->db->select('SUM(total_berat) AS pembelian_beras_arabika')
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

if ($this->input->post('jenis_pembelian') == 'Ceri') {
	
	if ($this->input->post('jenis_kopi') == 'arabika') {
		
		if ($this->input->post('berat') <= $ceri_arabika) {
			
			$total = $this->input->post('harga') * $this->input->post('berat');
			$jenis_pembelian 	= $this->input->post('jenis_pembelian');
			$jenis_kopi 		= $this->input->post('jenis_kopi');
			
			$kopi_baru =  [
								'jenis_pembelian'	=> $jenis_pembelian,
								'jenis_kopi' 		=> $jenis_kopi,
								'harga' 			=> $this->input->post('harga'),
								'berat' 			=> $this->input->post('berat'),
								'total'				=> $total,
								];

							// insert penjualan ke session penjualan
							$_SESSION['keranjang_penjualan'][] = $kopi_baru;

				$this->session->set_flashdata('message','
						<div class="alert alert-light-warning color-warning text-center"><i class="bi bi-star"></i> Kopi sudah masuk di keranjang penjualan.</div>');	
				redirect('Penjualan/Penjualan');
		}else{

			$this->session->set_flashdata('message','
					<div class="alert alert-light-warning color-warning text-center"><i class="bi bi-star"></i>Jumlah pembelian melebihi stok.</div>');	
			redirect('Penjualan/Penjualan');
		}

	}else{

		if ($this->input->post('berat') <= $ceri_robusta) {
			
			$total = $this->input->post('harga') * $this->input->post('berat');
			$jenis_pembelian 	= $this->input->post('jenis_pembelian');
			$jenis_kopi 		= $this->input->post('jenis_kopi');
			
			$kopi_baru =  [
								'jenis_pembelian'	=> $jenis_pembelian,
								'jenis_kopi' 		=> $jenis_kopi,
								'harga' 			=> $this->input->post('harga'),
								'berat' 			=> $this->input->post('berat'),
								'total'				=> $total,
								];

							// insert penjualan ke session penjualan
							$_SESSION['keranjang_penjualan'][] = $kopi_baru;

				$this->session->set_flashdata('message','
						<div class="alert alert-light-warning color-warning text-center"><i class="bi bi-star"></i> Kopi sudah masuk di keranjang penjualan.</div>');	
				redirect('Penjualan/Penjualan');
		}else{

			$this->session->set_flashdata('message','
					<div class="alert alert-light-warning color-warning text-center"><i class="bi bi-star"></i>Jumlah pembelian melebihi stok.</div>');	
			redirect('Penjualan/Penjualan');
		}
	}
}elseif ($this->input->post('jenis_pembelian') == 'Gabah') {
	
	if ($this->input->post('jenis_kopi') == 'arabika') {
		
		if ($this->input->post('berat') <= $gabah_arabika) {
			
			$total = $this->input->post('harga') * $this->input->post('berat');
			$jenis_pembelian 	= $this->input->post('jenis_pembelian');
			$jenis_kopi 		= $this->input->post('jenis_kopi');
			
			$kopi_baru =  [
								'jenis_pembelian'	=> $jenis_pembelian,
								'jenis_kopi' 		=> $jenis_kopi,
								'harga' 			=> $this->input->post('harga'),
								'berat' 			=> $this->input->post('berat'),
								'total'				=> $total,
								];

							// insert penjualan ke session penjualan
							$_SESSION['keranjang_penjualan'][] = $kopi_baru;

				$this->session->set_flashdata('message','
						<div class="alert alert-light-warning color-warning text-center"><i class="bi bi-star"></i> Kopi sudah masuk di keranjang penjualan.</div>');	
				redirect('Penjualan/Penjualan');
		}else{

			$this->session->set_flashdata('message','
					<div class="alert alert-light-warning color-warning text-center"><i class="bi bi-star"></i>Jumlah pembelian melebihi stok.</div>');	
			redirect('Penjualan/Penjualan');
		}

	}else{

		if ($this->input->post('berat') <= $gabah_robusta) {
			
			$total = $this->input->post('harga') * $this->input->post('berat');
			$jenis_pembelian 	= $this->input->post('jenis_pembelian');
			$jenis_kopi 		= $this->input->post('jenis_kopi');
			
			$kopi_baru =  [
								'jenis_pembelian'	=> $jenis_pembelian,
								'jenis_kopi' 		=> $jenis_kopi,
								'harga' 			=> $this->input->post('harga'),
								'berat' 			=> $this->input->post('berat'),
								'total'				=> $total,
								];

							// insert penjualan ke session penjualan
							$_SESSION['keranjang_penjualan'][] = $kopi_baru;

				$this->session->set_flashdata('message','
						<div class="alert alert-light-warning color-warning text-center"><i class="bi bi-star"></i> Kopi sudah masuk di keranjang penjualan.</div>');	
				redirect('Penjualan/Penjualan');
		}else{

			$this->session->set_flashdata('message','
					<div class="alert alert-light-warning color-warning text-center"><i class="bi bi-star"></i>Jumlah pembelian melebihi stok.</div>');	
			redirect('Penjualan/Penjualan');
		}
	}

}else {

	if ($this->input->post('jenis_kopi') == 'arabika') {
		
		if ($this->input->post('berat') <= $beras_arabika) {
			
			$total = $this->input->post('harga') * $this->input->post('berat');
			$jenis_pembelian 	= $this->input->post('jenis_pembelian');
			$jenis_kopi 		= $this->input->post('jenis_kopi');
			
			$kopi_baru =  [
								'jenis_pembelian'	=> $jenis_pembelian,
								'jenis_kopi' 		=> $jenis_kopi,
								'harga' 			=> $this->input->post('harga'),
								'berat' 			=> $this->input->post('berat'),
								'total'				=> $total,
								];

							// insert penjualan ke session penjualan
							$_SESSION['keranjang_penjualan'][] = $kopi_baru;

				$this->session->set_flashdata('message','
						<div class="alert alert-light-warning color-warning text-center"><i class="bi bi-star"></i> Kopi sudah masuk di keranjang penjualan.</div>');	
				redirect('Penjualan/Penjualan');
		}else{

			$this->session->set_flashdata('message','
					<div class="alert alert-light-warning color-warning text-center"><i class="bi bi-star"></i>Jumlah pembelian melebihi stok.</div>');	
			redirect('Penjualan/Penjualan');
		}

	}else{

		if ($this->input->post('berat') <= $beras_robusta) {
			
			$total = $this->input->post('harga') * $this->input->post('berat');
			$jenis_pembelian 	= $this->input->post('jenis_pembelian');
			$jenis_kopi 		= $this->input->post('jenis_kopi');
			
			$kopi_baru =  [
								'jenis_pembelian'	=> $jenis_pembelian,
								'jenis_kopi' 		=> $jenis_kopi,
								'harga' 			=> $this->input->post('harga'),
								'berat' 			=> $this->input->post('berat'),
								'total'				=> $total,
								];

							// insert penjualan ke session penjualan
							$_SESSION['keranjang_penjualan'][] = $kopi_baru;

				$this->session->set_flashdata('message','
						<div class="alert alert-light-warning color-warning text-center"><i class="bi bi-star"></i> Kopi sudah masuk di keranjang penjualan.</div>');	
				redirect('Penjualan/Penjualan');
		}else{

			$this->session->set_flashdata('message','
					<div class="alert alert-light-warning color-warning text-center"><i class="bi bi-star"></i>Jumlah pembelian melebihi stok.</div>');	
			redirect('Penjualan/Penjualan');
		}
	}
}
// 	$this->session->set_flashdata('message','
// 					<div class="alert alert-light-warning color-warning text-center"><i class="bi bi-star"></i>barang tidak ada</div>');	
// 			redirect('Penjualan/Penjualan');
// }
	// if ($this->input->post('berat') <= $jumlah_ceri->jumlah_ceri) {
	// 	$total = $this->input->post('harga') * $this->input->post('berat');
	// 	$jenis_pembelian 	= $this->input->post('jenis_pembelian');
	// 	$jenis_kopi 		= $this->input->post('jenis_kopi');
		
	// 	$kopi_baru =  [
	// 						'jenis_pembelian'	=> $jenis_pembelian,
	// 						'jenis_kopi' 		=> $jenis_kopi,
	// 						'harga' 			=> $this->input->post('harga'),
	// 						'berat' 			=> $this->input->post('berat'),
	// 						'total'				=> $total,
	// 						];

	// 					// insert penjualan ke session penjualan
	// 					$_SESSION['keranjang_penjualan'][] = $kopi_baru;

	// 		$this->session->set_flashdata('message','
	// 				<div class="alert alert-light-warning color-warning text-center"><i class="bi bi-star"></i> Kopi sudah masuk di keranjang penjualan.</div>');	
	// 		redirect('Penjualan/Penjualan');
	// }else{

	// 		$this->session->set_flashdata('message','
	// 				<div class="alert alert-light-warning color-warning text-center"><i class="bi bi-star"></i>Jumlah pembelian melebihi stok.</div>');	
	// 		redirect('Penjualan/Penjualan');
	// }

	

	}

	public function E_keranjang_penjualan($key)
	{

	$total = $this->input->post('harga') * $this->input->post('berat');
	$jenis_pembelian 	= $this->input->post('jenis_pembelian');
	$jenis_kopi 		= $this->input->post('jenis_kopi');
	
	$kopi_baru =  [
						'jenis_pembelian'	=> $jenis_pembelian,
						'jenis_kopi' 		=> $jenis_kopi,
						'harga' 			=> $this->input->post('harga'),
						'berat' 			=> $this->input->post('berat'),
						'total'				=> $total,
						];

					// edit session keranjang penjualan berdasarkan key
 					$_SESSION['keranjang_penjualan'][$key] = $kopi_baru;

		$this->session->set_flashdata('message','
				<div class="alert alert-light-success color-success text-center"><i class="bi bi-check-circle"></i> Data penjualan kopi sudah di edit dari keranjang penjualan</div>');	
		redirect('Penjualan/Penjualan');
	}
	public function H_keranjang($key)
	{
		// session_destroy();

		// hapus session keranjang penjualan berdasarkan key
		unset($_SESSION['keranjang_penjualan'][$key]);
		$this->session->set_flashdata('message','
				<div class="alert alert-light-success color-success text-center"><i class="bi bi-check-circle"></i> Data penjualan kopi sudah di hapus dari keranjang penjualan</div>');	
		redirect('Penjualan/Penjualan');
	}

	public function T_penjualan()
	{
		
		$id_penjualan 	= $this->M_id->idpenjualan();
		$id_dpenjualan 	= $this->M_id->iddpenjualan();
		$id_surat_jalan = $this->M_id->idsuratjalan();

		$total_berat = 0;
        $total_harga = 0;
        $total_pembayaran = 0;
        foreach($_SESSION['keranjang_penjualan'] as $key => $val):
            $total_berat = $total_berat + $_SESSION['keranjang_penjualan'][$key]['berat'];
            $total_harga = $total_harga + $_SESSION['keranjang_penjualan'][$key]['harga'];
            $total_pembayaran = $total_pembayaran + $_SESSION['keranjang_penjualan'][$key]['total'];
        endforeach;

		// input ke tabel d_penjualan, dan ambil id_penjualan di tabel penjualan
		foreach($_SESSION['keranjang_penjualan'] as $key => $val):

		$id_dpenjualan = $this->M_id->iddpenjualan();
		$d_penjualan = [
					
					'id'				=> null,
					'id_penjualan'  	=> $id_penjualan,
					'id_d_penjualan'	=> $id_dpenjualan,
					'jenis_penjualan'   => $_SESSION['keranjang_penjualan'][$key]['jenis_pembelian'],
					'jenis_kopi'   		=> $_SESSION['keranjang_penjualan'][$key]['jenis_kopi'],
					'harga'   			=> $_SESSION['keranjang_penjualan'][$key]['harga'],
					'berat'   			=> $_SESSION['keranjang_penjualan'][$key]['berat'],
					'total'   			=> $_SESSION['keranjang_penjualan'][$key]['total'],
				];

				// insert d_penjualan
				$this->db->insert('d_penjualan',$d_penjualan);
				
		endforeach;

		$penjualan =  [

						'id'				=> null,
						'id_penjualan'		=> $id_penjualan,
						'id_surat_jalan'	=> $id_surat_jalan,
						'total_berat'		=> $total_berat,
						'total_pembayaran'	=> $total_pembayaran,
						'id_buyers'			=> $this->input->post('buyers'),
						'jenis_pembayaran' 	=> $this->input->post('jenis_pembayaran'),
						'status' 			=> $this->input->post('status'),
						'memo' 				=> $this->input->post('memo'),
						'tanggal' 			=> $this->input->post('tanggal'),
						];

		// insert data penjualan
		$this->db->insert('penjualan',$penjualan);

		$surat_jalan =  [

						'id'				=> null,
						'id_surat_jalan'	=> $id_surat_jalan,
						'id_penjualan'		=> $id_penjualan,
						'id_buyers'			=> $this->input->post('buyers'),
						'pengemudi' 		=> $this->input->post('pengemudi'),
						'jenis_pengiriman' 	=> $this->input->post('jenis_pengiriman'),
						'no_polisi' 		=> $this->input->post('no_polisi'),
						'tanggal' 			=> $this->input->post('tanggal'),
						];

		// insert data surat jalan
		$this->db->insert('surat_jalan',$surat_jalan);
		
		// hapus session;
		unset($_SESSION['keranjang_penjualan']);
		unset($_SESSION['pembeli']);

		$this->session->set_flashdata('message', 
						'<div class="alert alert-light-success color-success"><i class="bi bi-check-circle"></i> Penjualan berhasil .</div>
					');	
		redirect('Penjualan/T_penjualan');
	}

	public function H_penjualan($id_penjualan)
	{	
		// hapus data penjualan berdasarkan id_penjualan
		$this->db->where('id_penjualan', $id_penjualan);
		$this->db->delete('penjualan');

		$this->session->set_flashdata('message', 
						'<div class="alert alert-light-success color-success text-center"><i class="bi bi-exclamation-circle"></i> Data penjualan sudah di berhasil di hapus </div>');
		redirect('Penjualan/T_penjualan');
	}
}

// $this->library->printr($data_suplier);
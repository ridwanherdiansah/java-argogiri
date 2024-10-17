<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class P_pembelian extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('M_id');
	}

	public function T_keranjang()
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

					// insert ke session keranjang
					$_SESSION['keranjang'][] = $kopi_baru;

		$this->session->set_flashdata('message','
				<div class="alert alert-light-warning color-warning text-center"><i class="bi bi-star"></i> Kopi sudah masuk di keranjang pembelian.</div>');	
		redirect('Pembelian/pembelian');

	}

	public function E_keranjang($key)
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

					// edit ke session keranjang
					$_SESSION['keranjang'][$key] = $kopi_baru;

		$this->session->set_flashdata('message','
				<div class="alert alert-light-success color-success text-center"><i class="bi bi-check-circle"></i> Data pembelian kopi sudah di edit dari keranjang</div>');	
		redirect('Pembelian/pembelian');
	}
	public function H_keranjang($key)
	{

		// hapus session keranjang berdasarkan key
		unset($_SESSION['keranjang'][$key]);
		$this->session->set_flashdata('message','
				<div class="alert alert-light-success color-success text-center"><i class="bi bi-check-circle"></i> Data pembelian kopi sudah di hapus dari keranjang pembelian</div>');	
		redirect('Pembelian/pembelian');
	}

	public function T_pembelian()
	{
		$id_inventori_ceri 	= $this->M_id->idinventoriceri();
		$id_inventori_gabah = $this->M_id->idinventorigabah();
		$id_pembelian 		= $this->M_id->idpembelian();
		$tanggal 			= date('d/m/y');

		$ceri_arabika	= $this->db->select('*')
									->from('inventori_ceri')
									->where('inventori_ceri.tanggal',$tanggal)
									->where('inventori_ceri.jenis_kopi', $this->input->post('jenis_kopi'))
									->get()
									->row_array();
		$ceri_robusta	= $this->db->select('*')
									->from('inventori_ceri')
									->where('inventori_ceri.tanggal',$tanggal)
									->where('inventori_ceri.jenis_kopi', $this->input->post('jenis_kopi'))
									->get()
									->row_array();
		$gabah_arabika	= $this->db->select('*')
									->from('inventori_gabah')
									->where('inventori_gabah.tanggal',$tanggal)
									->where('inventori_gabah.jenis_kopi', $this->input->post('jenis_kopi'))
									->get()
									->row_array();
		$gabah_robusta	= $this->db->select('*')
									->from('inventori_gabah')
									->where('inventori_gabah.tanggal',$tanggal)
									->where('inventori_gabah.jenis_kopi', $this->input->post('jenis_kopi'))
									->get()
									->row_array();

		$pembelian =  [

						// 'id'				=> null,
						'id_pembelian'		=> $id_pembelian,
						'total_berat'		=> $this->input->post('berat'),
						'total_pembayaran'	=> $this->input->post('berat') * $this->input->post('harga'),
						'id_suplier'		=> $this->input->post('suplier'),
						'jenis_pembelian' 	=> $this->input->post('jenis_pembelian'),
						'jenis_kopi' 		=> $this->input->post('jenis_kopi'),
						'jenis_pembayaran' 	=> $this->input->post('jenis_pembayaran'),
						'status' 			=> $this->input->post('status'),
						'memo' 				=> $this->input->post('memo'),
						'tanggal'			=> date('d/m/y'),
						];

		if ($this->input->post('jenis_pembelian') == 'Ceri') {
			
			if ($ceri_arabika) {
				
				//data baru
				$update_inventori_ceri_arabika =  [

						'jenis_kopi'		=> $this->input->post('jenis_kopi'),
						'ceri'				=> $this->input->post('berat') + $ceri_arabika['ceri'],
						'tanggal'			=> date('d/m/y'),
						];

				// update data inventori
					$this->db->set('tanggal', $update_inventori_ceri_arabika['tanggal']);
					$this->db->where('tanggal', $update_inventori_ceri_arabika['tanggal']);
					$this->db->where('jenis_kopi', $this->input->post('jenis_kopi'));
					$this->db->update('inventori_ceri', $update_inventori_ceri_arabika);

				// insert pembelian
					$this->db->insert('pembelian',$pembelian);

				redirect('Pembelian/T_pembelian');

			}elseif ($ceri_robusta) {
				
				//data baru
				$update_inventori_ceri_robusta =  [

						'jenis_kopi'		=> $this->input->post('jenis_kopi'),
						'ceri'				=> $this->input->post('berat') + $ceri_robusta['ceri'],
						'tanggal'			=> date('d/m/y'),
						];

				// update data inventori
					$this->db->set('tanggal', $update_inventori_ceri_robusta['tanggal']);
					$this->db->where('tanggal', $update_inventori_ceri_robusta['tanggal']);
					$this->db->where('jenis_kopi', $this->input->post('jenis_kopi'));
					$this->db->update('inventori_ceri', $update_inventori_ceri_robusta);
				
				// insert pembelian
					$this->db->insert('pembelian',$pembelian);

				redirect('Pembelian/T_pembelian');

			}else{

				//data baru
				$baru_inventori_ceri =  [

						// 'id'				=> null,
						'id_inventori_ceri'	=> $id_inventori_ceri,
						'jenis_kopi'		=> $this->input->post('jenis_kopi'),
						'ceri'				=> $this->input->post('berat'),
						'tanggal'			=> date('d/m/y'),
						];

				$this->db->insert('inventori_ceri',$baru_inventori_ceri);
				
				// insert pembelian
					$this->db->insert('pembelian',$pembelian);

				redirect('Pembelian/T_pembelian');
			}

		}else{

			if ($gabah_arabika) {

				//data baru
				$update_inventori_gabah_arabika =  [

						'jenis_kopi'		=> $this->input->post('jenis_kopi'),
						'gabah'				=> $this->input->post('berat') + $gabah_arabika['gabah'],
						'tanggal'			=> date('d/m/y'),
						];

				// update data inventori
					$this->db->set('tanggal', $update_inventori_gabah_arabika['tanggal']);
					$this->db->where('tanggal', $update_inventori_gabah_arabika['tanggal']);
					$this->db->where('jenis_kopi', $this->input->post('jenis_kopi'));
					$this->db->update('inventori_gabah', $update_inventori_gabah_arabika);

				// insert pembelian
					$this->db->insert('pembelian',$pembelian);

				redirect('Pembelian/T_pembelian');

			}elseif ($gabah_robusta) {
				
				//data baru
				$update_inventori_gabah_robusta =  [

						'jenis_kopi'		=> $this->input->post('jenis_kopi'),
						'gabah'				=> $this->input->post('berat') + $gabah_robusta['gabah'],
						'tanggal'			=> date('d/m/y'),
						];

				// update data inventori
					$this->db->set('tanggal', $update_inventori_gabah_robusta['tanggal']);
					$this->db->where('tanggal', $update_inventori_gabah_robusta['tanggal']);
					$this->db->where('jenis_kopi', $this->input->post('jenis_kopi'));
					$this->db->update('inventori_gabah', $update_inventori_gabah_robusta);
				
				// insert pembelian
					$this->db->insert('pembelian',$pembelian);

				redirect('Pembelian/T_pembelian');

			}else{
				
				//data baru
				$baru_inventori_gabah =  [

						// 'id'				=> null,
						'id_inventori_gabah'	=> $id_inventori_gabah,
						'jenis_kopi'		=> $this->input->post('jenis_kopi'),
						'gabah'				=> $this->input->post('berat'),
						'tanggal'			=> date('d/m/y'),
						];

				$this->db->insert('inventori_gabah',$baru_inventori_gabah);

				// insert pembelian
					$this->db->insert('pembelian',$pembelian);

				redirect('Pembelian/T_pembelian');

			}
		}


		// $id_pembelian 	= $this->M_id->idpembelian();
		// $id_dpembelian 	= $this->M_id->iddpembelian();

		// $total_berat = 0;
  //       $total_harga = 0;
  //       $total_pembayaran = 0;
  //       foreach($_SESSION['keranjang'] as $key => $val):
  //           $total_berat = $total_berat + $_SESSION['keranjang'][$key]['berat'];
  //           $total_harga = $total_harga + $_SESSION['keranjang'][$key]['harga'];
  //           $total_pembayaran = $total_pembayaran + $_SESSION['keranjang'][$key]['total'];
  //       endforeach;

		// // input ke tabel d_pembelian, dan ambil id_pembelian di tabel pembelian
		// foreach($_SESSION['keranjang'] as $key => $val):

		// $id_dpembelian = $this->M_id->iddpembelian();
		// $d_pembelian = [
					
		// 			'id'				=> null,
		// 			'id_pembelian'  	=> $id_pembelian,
		// 			'id_d_pembelian'	=> $id_dpembelian,
		// 			'jenis_pembelian'   => $_SESSION['keranjang'][$key]['jenis_pembelian'],
		// 			'jenis_kopi'   		=> $_SESSION['keranjang'][$key]['jenis_kopi'],
		// 			'harga'   			=> $_SESSION['keranjang'][$key]['harga'],
		// 			'berat'   			=> $_SESSION['keranjang'][$key]['berat'],
		// 			'total'   			=> $_SESSION['keranjang'][$key]['total'],
		// 		];

		// 		// insert d_pembelian
		// 		$this->db->insert('d_pembelian',$d_pembelian);
				
		// endforeach;

		// $pembelian =  [

		// 				// 'id'				=> null,
		// 				'id_pembelian'		=> $id_pembelian,
		// 				'total_berat'		=> $total_berat,
		// 				'total_pembayaran'	=> $total_pembayaran,
		// 				'id_suplier'			=> $this->input->post('suplier'),
		// 				'jenis_pembayaran' 	=> $this->input->post('jenis_pembayaran'),
		// 				'status' 			=> $this->input->post('status'),
		// 				'memo' 				=> $this->input->post('memo'),
		// 				'tanggal'			=> date('y/m/d'),
		// 				];

		// // insert pembelian
		// $this->db->insert('pembelian',$pembelian);
		
		// // hapus session;
		// unset($_SESSION['keranjang']);
		// unset($_SESSION['pembeli']);

		// $this->session->set_flashdata('message', 
		// 				'<div class="alert alert-light-success color-success text-center"><i class="bi bi-check-circle"></i> Pembelian sukses.</div>
		// 			');	
		// redirect('Pembelian/T_pembelian');
	}

	public function H_pembelian($id_pembelian)
	{
		// session_destroy();
		
		$pembelian = $this->db->get_where('pembelian',['id_pembelian' => $id_pembelian])->row_array();

		if ($pembelian['jenis_pembelian'] == 'Ceri') {
			
			$inventori_ceri = $this->db->get_where('inventori_ceri', ['tanggal' => $pembelian['tanggal'], 'jenis_kopi' => $pembelian['jenis_kopi']])->row_array();

				// $this->library->printr($pembelian['total_berat']);

				//data baru
					$update_inventori_ceri_arabika =  [

							'ceri'	=> $inventori_ceri['ceri'] - $pembelian['total_berat'],
							];

					// update data inventori
						$this->db->set('id_inventori_ceri', $inventori_ceri['id_inventori_ceri']);
						$this->db->where('tanggal', $pembelian['tanggal']);
						$this->db->where('jenis_kopi', $pembelian['jenis_kopi']);
						$this->db->update('inventori_ceri', $update_inventori_ceri_arabika);

					// hapus data pembelian
						$this->db->where('id_pembelian', $id_pembelian);
						$this->db->delete('pembelian');
				redirect('Pembelian/T_pembelian');
		
		}else{

			$inventori_gabah = $this->db->get_where('inventori_gabah', ['tanggal' => $pembelian['tanggal'], 'jenis_kopi' => $pembelian['jenis_kopi']])->row_array();

				//data baru
					$update_inventori_gabah_arabika =  [

							'gabah'	=> $inventori_gabah['gabah'] - $pembelian['total_berat'],
							];

					// update data inventori
						$this->db->set('id_inventori_gabah', $inventori_gabah['id_inventori_gabah']);
						$this->db->where('tanggal', $pembelian['tanggal']);
						$this->db->where('jenis_kopi', $pembelian['jenis_kopi']);
						$this->db->update('inventori_gabah', $update_inventori_gabah_arabika);

					// hapus data pembelian
						$this->db->where('id_pembelian', $id_pembelian);
						$this->db->delete('pembelian');
				redirect('Pembelian/T_pembelian');
		}
	}
}

// $this->library->printr($data_suplier);
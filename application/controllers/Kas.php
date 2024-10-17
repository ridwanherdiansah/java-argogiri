<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('M_id');
	}

	public function Kas()
	{

		$jumlah_kas				= $this->db->select('SUM(saldo) AS jumlah_kas')
									   ->from('kas')
									   // ->where("YEAR(tanggal)={$tahun}")
									   ->get()
									   ->row();

		$jumlah_saldo_penjualan	= $this->db->select('SUM(total_pembayaran) AS jumlah_saldo_penjualan')
									   ->from('penjualan')
									   // ->where("YEAR(tanggal)={$tahun}")
									   ->get()
									   ->row();

		$jumlah_pemasukan = $jumlah_kas->jumlah_kas + $jumlah_saldo_penjualan->jumlah_saldo_penjualan;

		$jumlah_pembelian		= $this->db->select('SUM(total_pembayaran) AS jumlah_pembelian')
									   ->from('pembelian')
									   // ->where("YEAR(tanggal)={$tahun}")
									   ->get()
									   ->row();

		$jumlah_pengeluaran = $jumlah_pembelian->jumlah_pembelian;

		$data = array(
			'kas' 					=> $kas = $this->db->get_where('kas')->result_array(),
			'jumlah_pemasukan'		=> $jumlah_pemasukan,
			'jumlah_pengeluaran'	=> $jumlah_pengeluaran,
			'jumlah_saldo'			=> $jumlah_pemasukan - $jumlah_pengeluaran,
		);

		$this->load->view('template/admin/header');
		$this->load->view('template/admin/topbar');
		$this->load->view('Kas/Kas', $data);
		$this->load->view('template/admin/footer');
	}

	public function T_kas()
	{
		$jumlah_kas				= $this->db->select('SUM(saldo) AS jumlah_kas')
									   ->from('kas')
									   // ->where("YEAR(tanggal)={$tahun}")
									   ->get()
									   ->row();

		$jumlah_saldo_penjualan	= $this->db->select('SUM(total_pembayaran) AS jumlah_saldo_penjualan')
									   ->from('penjualan')
									   // ->where("YEAR(tanggal)={$tahun}")
									   ->get()
									   ->row();

		$jumlah_pemasukan = $jumlah_kas->jumlah_kas + $jumlah_saldo_penjualan->jumlah_saldo_penjualan;

		$jumlah_pembelian		= $this->db->select('SUM(total_pembayaran) AS jumlah_pembelian')
									   ->from('pembelian')
									   // ->where("YEAR(tanggal)={$tahun}")
									   ->get()
									   ->row();

		$jumlah_pengeluaran = $jumlah_pembelian->jumlah_pembelian;

		$password = $this->input->post('password');

		$admin = $this->db->get_where('admin', ['username' => $_SESSION['admin']['username']])->row_array();
		
		if ($admin) {
			

			if ($admin['password'] == $password) {
				
				$this->session->set_flashdata('message_saldo', 
						'<div class="alert alert-light-success color-success text-center"><i class="bi bi-exclamation-circle"></i> Silahkan masukan nominal saldo anda. </div>
					');

				$data = array(
						'kas' 					=> $kas = $this->db->get_where('kas')->result_array(),
						'jumlah_pemasukan'		=> $jumlah_pemasukan,
						'jumlah_pengeluaran'	=> $jumlah_pengeluaran,
						'jumlah_saldo'			=> $jumlah_pemasukan - $jumlah_pengeluaran,
					);

				$this->load->view('template/admin/header');
				$this->load->view('template/admin/topbar');
				$this->load->view('Kas/T_kas', $data);
				$this->load->view('template/admin/footer');

				
			
			}else{

				$this->session->set_flashdata('message', 
						'<div class="alert alert-light-danger color-danger text-center"><i class="bi bi-exclamation-circle"></i> Password yang anda masukan salah. </div>
					');

				redirect('Kas/Kas');	
			}

		}else{

			redirect('P_auth/logout');
		}
	}

	public function E_kas($id_kas)
	{
		$password = $this->input->post('password');

		$admin = $this->db->get_where('admin', ['username' => $_SESSION['admin']['username']])->row_array();
		$kas = $this->db->get_where('kas', ['id_kas' => $id_kas])->row_array();
		
		if ($admin) {
			

			if ($admin['password'] == $password) {
				
				if ($kas) {
					
					$this->session->set_flashdata('message_saldo', 
						'<div class="alert alert-light-success color-success text-center"><i class="bi bi-exclamation-circle"></i> Silahkan edit nominal saldo yang di masukan. </div>
					');

					$data = array(
						'kas' 	=> $kas,
						);

					$this->load->view('template/admin/header');
					$this->load->view('template/admin/topbar');
					$this->load->view('Kas/E_kas', $data);
					$this->load->view('template/admin/footer');

				}else{

					$this->session->set_flashdata('message', 
						'<div class="alert alert-light-danger color-danger text-center"><i class="bi bi-exclamation-circle"></i> Data yang di edit tidak ada. </div>
					');

					redirect('Kas/Kas');	

				}
			
			}else{

				$this->session->set_flashdata('message', 
						'<div class="alert alert-light-danger color-danger text-center"><i class="bi bi-exclamation-circle"></i> Password yang anda masukan salah. </div>
					');

				redirect('Kas/Kas');	
			}

		}else{

			redirect('P_auth/logout');
		}
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_join extends CI_Model {

	public function l_pembelian($id_pembelian)
	{
		$this->db->select('*');
		$this->db->from('pembelian');
		$this->db->join('d_pembelian', 'pembelian.id_pembelian = d_pembelian.id_pembelian');
		$this->db->where('pembelian.id_pembelian =', $id_pembelian);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function l_penjualan($id_penjualan)
	{
		$this->db->select('*');
		$this->db->from('penjualan');
		$this->db->join('d_penjualan', 'penjualan.id_penjualan = d_penjualan.id_penjualan');
		$this->db->where('penjualan.id_penjualan =', $id_penjualan);
		$query = $this->db->get();
		return $query->result_array();
	}
	
}

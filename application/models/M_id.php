<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_id extends CI_Model {

	public function idsuplier()
		{
			$urut = "SU00";
			$query = $this->db->select('id')->from('suplier')->order_by('id','desc');
			$nomor = $query->get()->row();
			$newNumber = $nomor->id + 1;
			$id = "{$urut}{$newNumber}";
			return $id;
		}

	public function idbuyers()
		{
			$urut = "BU00";
			$query = $this->db->select('id')->from('buyers')->order_by('id','desc');
			$nomor = $query->get()->row();
			$newNumber = $nomor->id + 1;
			$id = "{$urut}{$newNumber}";
			return $id;
		}

	public function idpembelian()
		{
			$urut = "PE00";
			$query = $this->db->select('id')->from('pembelian')->order_by('id','desc');
			$nomor = $query->get()->row();
			$newNumber = $nomor->id + 1;
			$id = "{$urut}{$newNumber}";
			return $id;
		}

	public function iddpembelian()
		{
			$urut = "DP00";
			$query = $this->db->select('id')->from('d_pembelian')->order_by('id','desc');
			$nomor = $query->get()->row();
			$newNumber = $nomor->id + 1;
			$id = "{$urut}{$newNumber}";
			return $id;
		}
	
	public function idpenjualan()
		{
			$urut = "PEN00";
			$query = $this->db->select('id')->from('penjualan')->order_by('id','desc');
			$nomor = $query->get()->row();
			$newNumber = $nomor->id + 1;
			$id = "{$urut}{$newNumber}";
			return $id;
		}

	public function iddpenjualan()
		{
			$urut = "DPE00";
			$query = $this->db->select('id')->from('d_penjualan')->order_by('id','desc');
			$nomor = $query->get()->row();
			$newNumber = $nomor->id + 1;
			$id = "{$urut}{$newNumber}";
			return $id;
		}

	public function idsuratjalan()
		{
			$urut = "SJ00";
			$query = $this->db->select('id')->from('surat_jalan')->order_by('id','desc');
			$nomor = $query->get()->row();
			$newNumber = $nomor->id + 1;
			$id = "{$urut}{$newNumber}";
			return $id;
		}

	public function idkas()
		{
			$urut = "KAS00";
			$query = $this->db->select('id')->from('kas')->order_by('id','desc');
			$nomor = $query->get()->row();
			$newNumber = $nomor->id + 1;
			$id = "{$urut}{$newNumber}";
			return $id;
		}

	public function idinventoriceri()
		{
			$urut = "INVECER00";
			$query = $this->db->select('id')->from('inventori_ceri')->order_by('id','desc');
			$nomor = $query->get()->row();
			$newNumber = $nomor->id + 1;
			$id = "{$urut}{$newNumber}";
			return $id;
		}
	public function idinventorigabah()
		{
			$urut = "INVEGAB00";
			$query = $this->db->select('id')->from('inventori_gabah')->order_by('id','desc');
			$nomor = $query->get()->row();
			$newNumber = $nomor->id + 1;
			$id = "{$urut}{$newNumber}";
			return $id;
		}
	
}

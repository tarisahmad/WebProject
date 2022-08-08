<?php 
class Model_kategori extends CI_Model{
	public function data_kaos(){
		return $this->db->get_where("tb_barang", array('Kategori' => 'kaos'));
	}

	public function data_kemeja(){
		return $this->db->get_where("tb_barang", array('Kategori' => 'kemeja'));
	}

	public function data_celana(){
		return $this->db->get_where("tb_barang", array('Kategori' => 'celana'));
	}

	public function data_sepatu(){
		return $this->db->get_where("tb_barang", array('Kategori' => 'sepatu'));
	}

	public function data_aksesoris(){
		return $this->db->get_where("tb_barang", array('Kategori' => 'aksesoris'));
	}
}
?>
<?php 
class Model_barang extends CI_Model{
	public function tampil_data(){
		return $this->db->get('tb_barang');
	}

	public function tambah_barang($data,$table){
		$this->db->insert($table,$data);
	}

	public function edit_barang($where,$table){
		return $this->db->get_where($table,$where);
	}

	public function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	
	public function find($Id){
		$result = $this->db->where('Id_brg',$Id)
						   ->limit(1)
						   ->get('tb_barang');
		if($result->num_rows() > 0){
			return $result->row();
		}else{
			return array();
		}
	}

	public function detail_brg($Id_brg){
		$result = $this->db->where('Id_brg',$Id_brg)-> get('tb_barang');
		if ($result->num_rows() > 0) {
			return $result->result();
		}else{
			return false;
		}
	}

	public function get_keyword($keyword){
		$this->db->select('*');
		$this->db->from('tb_barang');
		$this->db->like('Id_brg', $keyword);
		$this->db->or_like('Nama_brg', $keyword);
		$this->db->or_like('Keterangan', $keyword);
		$this->db->or_like('Kategori', $keyword);
		$this->db->or_like('Harga', $keyword);
		$this->db->or_like('Stok', $keyword);
		$this->db->or_like('Gambar', $keyword);
		return $this->db->get()->result();
	}
}

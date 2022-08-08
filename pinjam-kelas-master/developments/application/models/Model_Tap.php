<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Tap extends CI_Model 
{
	var $table = 'tb_peminjaman';

	public function tampil()
    {
        return $this->db->order_by('id_peminjaman', 'DESC')->get($this->table);
    }
}
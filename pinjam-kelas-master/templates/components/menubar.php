<?php

/*
|--------------------------------------------------------------------------
| Limitasi Hak Akses Menubar
|--------------------------------------------------------------------------
|
| Membatasi menu yang bisa diakses oleh user 
| berdasarkan tingkatan akses yang dimiliki.
|
*/

// Level Akses 1 (Admin)
if($this->session->userdata('level') == "1")
{
	$this->load->view('components/menubar-admin');
}

// Level Akses 2 (Admin)
if($this->session->userdata('level') == "2")
{
	$this->load->view('components/menubar-user');
}

// Level Akses User
if($this->session->userdata('level') == "3")
{
	$this->load->view('components/menubar-user');
}

?>
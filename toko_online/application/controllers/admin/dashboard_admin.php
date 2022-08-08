<?php 

class Dashboard_admin extends CI_Controller{

	public function __construct(){
		parent::__construct();

		if($this->session->userdata('role_id') != '1'){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  	Anda belum login!.
			  	<button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
				</div>');
				redirect('auth/login');
		}
	}
	public function index(){
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('templates_admin/footer');
		$this->load->view('admin/dashboard');
	}
	public function tambah_ke_keranjang($Id){
		$barang = $this->model_barang->find($Id);

			$data = array(
	        'id'      => $barang->Id_brg,
	        'qty'     => 1,
	        'price'   => $barang->harga,
	        'name'    => $barang->Nama_brg,
	);

	$this->cart->insert($data);
	redirect('dashboard');
	}

	public function cari(){
		$keyword = $this->input->post('keyword');
		$data['barang'] = $this->model_barang->get_keyword($keyword);
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('dashboard', $data);
		$this->load->view('templates/footer');
	}
}
?>

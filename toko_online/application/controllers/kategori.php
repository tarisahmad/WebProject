<?php 
class Kategori extends CI_Controller{
	public function kaos(){
		$data['kaos'] = $this->model_kategori->data_kaos()->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('kaos', $data);
		$this->load->view('templates/footer');
	}

	public function kemeja(){
		$data['kemeja'] = $this->model_kategori->data_kemeja()->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('kemeja', $data);
		$this->load->view('templates/footer');
	}

	public function celana(){
		$data['celana'] = $this->model_kategori->data_celana()->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('celana', $data);
		$this->load->view('templates/footer');
	}

	public function sepatu(){
		$data['sepatu'] = $this->model_kategori->data_sepatu()->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('sepatu', $data);
		$this->load->view('templates/footer');
	}

	public function aksesoris(){
		$data['aksesoris'] = $this->model_kategori->data_aksesoris()->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('aksesoris', $data);
		$this->load->view('templates/footer');
	}
}

?>
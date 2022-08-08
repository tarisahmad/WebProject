<?php 
class Data_barang extends CI_Controller{
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
		$data['barang'] = $this->model_barang->tampil_data()->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/data_barang', $data);
		$this->load->view('templates_admin/footer');
	}

	public function tambah_aksi(){
		$Nama_brg = $this->input->post('Nama_brg');
		$Keterangan = $this->input->post('Keterangan');
		$Kategori = $this->input->post('Kategori');
		$Harga = $this->input->post('Harga');
		$Stok = $this->input->post('Stok');
		$Gambar = $_FILES['Gambar']['name'];
		if ($Gambar =''){}else{
			$config['upload_path'] 	= './uploads/';
			$config['allowed_type'] = 'jpg|jpeg|png|gif';
			$config['max_width']	= 472;
			$config['max_height']	= 354;

			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('Gambar')){
				echo "Gambar gagal diupload";
			}else{
				echo "Gambar berhasil diupload";
			}
		$Gambar=$this->upload->data('file_name');
		}

		$data = array(
			'Nama_brg' 		=>$Nama_brg,
			'Keterangan' 	=>$Keterangan,
			'Kategori' 		=>$Kategori,
			'Harga' 		=>$Harga,
			'Stok' 			=>$Stok,
			'Gambar'		=>$Gambar
		);

		$this->model_barang->tambah_barang($data, 'tb_barang');
		redirect('admin/data_barang/index');
	}

	public function edit($Id)
	{
		$where = array('Id_brg' => $Id);
		$data['barang'] = $this->model_barang->edit_barang($where,'tb_barang')->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('templates_admin/footer');
		$this->load->view('admin/edit_barang', $data);
	}

	public function update(){
		$Id = $this->input->post('Id_brg');
		$Nama_brg = $this->input->post('Nama_brg');
		$Keterangan = $this->input->post('Keterangan');
		$Kategori = $this->input->post('Kategori');
		$Harga = $this->input->post('Harga');
		$Stok = $this->input->post('Stok');
		
		$data = array(

			'Nama_brg' => $Nama_brg,
			'Keterangan' => $Keterangan,
			'Kategori' => $Kategori,
			'Harga' => $Harga,
			'Stok' => $Stok
		);

		$where = array(
			'Id_brg' => $Id
		);

		$this->model_barang->update_data($where,$data,'tb_barang');
		redirect('admin/data_barang/index');
	}

	public function hapus($Id){
		$where = array('Id_brg' => $Id);
		$this->model_barang->hapus_data($where, 'tb_barang');
		redirect('admin/data_barang/index');
	}

	public function detail($Id_brg){
		$data['barang'] = $this->model_barang->detail_brg($Id_brg);
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/detail_barang',$data);
		$this->load->view('templates_admin/footer');
	}
}
?>
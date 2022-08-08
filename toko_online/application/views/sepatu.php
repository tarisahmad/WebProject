<div class="container-fluid">

	<div class="row text-center mt-4">

		<?php foreach ($sepatu as $brg) : ?>
			<div class="card ml-3 mb-3" style="width: 16rem;">
			  <img src="<?php echo base_url().'./uploads/'.$brg->Gambar ?>" width="640" height="225" overflow="hidden" class="card-img-top" alt="...">
			  <div class="card-body">
			    <h5 class="card-title mb-1"><?php echo $brg->Nama_brg ?></h5>
			    <small><?php echo $brg->Keterangan ?></small><br>
			    <span class="badge rounded-pill bg-success mb-3">Rp. <?php echo number_format($brg->Harga), 0, ',','.' ?></span>
			    <?php echo anchor('dashboard/tambah_ke_keranjang/'.$brg->Id_brg,'<div class="btn btn-sm btn-primary">Tambah ke Keranjang</div>')  ?>
			    <?php echo anchor('dashboard/detail_brg/'.$brg->Id_brg,'<div class="btn btn-sm btn-success">Detail</div>')  ?>
			  </div>
			</div>	
		<?php endforeach; ?>

	</div>
</div>
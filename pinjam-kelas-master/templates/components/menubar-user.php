<!-- Menubar User: 2, 2, dan 3 -->
<ul>
	<li <?php if($hal == "Beranda") echo "class='active'"; ?>>
		<a href="<?php echo base_url('dashboard'); ?>"><!-- <span class="lnr lnr-home"></span> -->Beranda</a>
	</li>
	<li <?php if($hal == "Kelola Data Ruangan") echo "class='active'"; ?>>
		<a href="<?php echo base_url('dashboard/data-ruangan'); ?>"><!-- <span class="lnr lnr-database"></span> -->Data Ruangan</a>
	</li>
	<li <?php if($hal == "Data Peminjaman" OR $hal == "Laporan Peminjaman") echo "class='active'"; ?>>
		<a href="<?php echo base_url('dashboard/data-peminjaman'); ?>"><!-- <span class="lnr lnr-layers"></span> -->Data Peminjaman
			<?php if ($hal == "Data Peminjaman" && $this->session->userdata('level') == "2"): ?>
				<?php foreach($tb as $baris): ?>
					<?php if($baris['status_pinjam'] == "Menunggu" ): ?>
						<span class="badge badge-pill badge-secondary">1</span>
					<?php endif; ?>
				<?php endforeach; ?>
			<?php endif ?>
		</a>
	</li>
</ul>
<h1 class="h2">Akuntabilitas Anggaran</h1>
<div class="btn-toolbar mb-2 mb-md-0">
	<button class="btn btn-sm btn-outline-secondary">
	  <span data-feather="calendar"></span>
	  Tahun <?= $_SESSION['tahun'] ?>
	</button>
</div>
</div>
<?php if (isset($message)): ?>
<p><?= $message ?></p>	
<?php endif ?>
<?php if ($akuntabilitasAnggaran->num_rows() > 0): ?>
	<?php $row = $akuntabilitasAnggaran->row_array(); ?>
	<p>
		<div class="card">
			<div class="card-body">
				<?= $row['konten'] ?>
			</div>
		</div>	
	</p>
	<?php if ($row['selesai'] == 'n'): ?>	
		<p>
			<a class="btn btn-primary" href="<?= base_url('submenu/editakuntabilitasanggaran/' . $row['id']) ?>"><span data-feather="edit"></span> Edit</a>
			<a class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus evaluasi dan analisis capaian kinerja?'); " href="<?= base_url('submenu/deleteakuntabilitasanggaran/' . $row['id']) ?>"><span data-feather="trash"></span> Delete</a>
			<a class="btn btn-success float-right" href="<?= base_url('submenu/endakuntabilitasanggaran/' . $row['id']) ?>"  onclick="return confirm('Apakah anda yakin akuntabilitas anggaran sudah selesai?');"><span data-feather="check-circle"></span> Tandai selesai</a>
		</p>
	<?php else: ?>	
		<p>
			<a class="btn btn-danger float-right" href="<?= base_url('submenu/unlockakuntabilitasanggaran/' . $row['id']) ?>" onclick="return confirm('Apakah anda yakin akan merivisi ulang akuntabilitas anggaran?');"><span data-feather="unlock"></span> Revisi ulang</a>				
		</p>	
	<?php endif ?>	
<?php else: ?>
	<p>
		<span class="h6">Akuntabilitas anggaran belum ditambahkan!</span>
	</p>
	<p>
		<a class="btn btn-primary" href="<?= base_url('submenu/addakuntabilitasanggaran') ?>"><span data-feather="plus-circle"></span> Tambah</a>	
	</p>
<?php endif ?>
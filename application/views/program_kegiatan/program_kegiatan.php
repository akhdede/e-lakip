  <h1 class="h2">Program / Kegiatan</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
    </div>
    <button class="btn btn-sm btn-outline-secondary">
      <span data-feather="calendar"></span>
      Tahun <?= $_SESSION['tahun'] ?>
    </button>
  </div>
</div>
<?php if (isset($message)): ?>
<p class="msg"><?= $message ?></p>	
<?php endif ?>

<form class="form-inline" method="post">
	<div class="form-group mx-sm-1 mb-2">
    	<label for="program" class="sr-only">Program</label>
    	<input type="text" name="nama" class="form-control" id="program" placeholder="Nama Program" style="width: 500px;">
	</div>
	<button type="submit" class="btn btn-primary mb-2" data-toggle="tooltip" data-placement="top" title="Tambah Program"><span data-feather="plus"></span></button>
</form>

<?php
$en = json_encode($this->m_pk->viewProgram()->result());

$data = json_decode($en);

$encode_kegiatan = json_encode($this->m_pk->viewKegiatan()->result());

$decode_kegiatan = json_decode($encode_kegiatan);
?>

<hr>

<h1 class="h5">Program : </h1>

<hr>

<?php if(count($data) > 0) : ?>

<?php foreach($data as $d) : ?>
<form class="form-inline" method="post">
	<div class="form-group mb-2">
		<label for="vprogram" class="sr-only">Program</label>
		<input type="text" readonly class="form-control-plaintext font-weight-bold" id="vprogram" value="<?= $d->nama ?>" style="width: 500px;">
	</div>
	<a class="text-secondary" href="<?=base_url('pk/delete_program/' . $d->id)?>" onclick="return confirm('Apakah anda yakin akan menghapus program ini?')"><span data-feather="trash" data-toggle="tooltip" data-placement="top" title="Hapus Program"></span></a>&nbsp;

	<a class="text-secondary" href="#" data-toggle="modal" data-target="#program<?=$d->id?>"><span data-feather="edit" data-toggle="tooltip" data-placement="top" title="Edit Program"></span></a><br>&nbsp;&nbsp;&nbsp;&nbsp;

	<a class="text-secondary" href="#" data-toggle="modal" data-target="#addkegitanprogram<?=$d->id?>"><span data-feather="plus"data-toggle="tooltip" data-placement="top" title="Tambah Kegiatan"></span></a>
</form>

<!-- Start Modal Program Edit-->
<form method="post" action="<?=base_url('pk/edit_program/' . $d->id)?>">
	<div class="modal fade" id="program<?=$d->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLongTitle">Edit Program</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	          <div class="form-group">
	            <label class="col-form-label">Nama program :</label>
	            <input name="nama" type="text" class="form-control" value="<?=$d->nama?>">
	          </div>
	      </div>
	      <div class="modal-footer">
	        <button type="reset" class="btn btn-secondary" data-dismiss="modal"><span data-feather="arrow-left"></span> Batal</button>
	        <button type="submit" class="btn btn-primary" name="update"><span data-feather="refresh-cw"></span> Update</button>
	      </div>
	    </div>
	  </div>
	</div>
</form>
<!-- End Modal Program Edit -->

<!-- Start Modal Add Kegiatan -->
<form method="post" action="<?=base_url('pk/add_kegiatan')?>">
	<div class="modal fade" id="addkegitanprogram<?=$d->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Kegiatan</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	          <div class="form-group">
	            <label class="col-form-label">Nama program :</label>
				<input type="text" readonly class="form-control-plaintext font-weight-bold" id="vprogram" value="<?= $d->nama ?>" style="width: 500px;">
	          </div>
	          <div class="form-group">
	            <label class="col-form-label">Nama kegiatan :</label>
	            <input type="hidden" name="id_program" value="<?=$d->id?>">
	            <input name="nama" type="text" class="form-control" placeholder="Nama Kegiatan">
	          </div>

	      </div>
	      <div class="modal-footer">
	        <button type="reset" class="btn btn-secondary" data-dismiss="modal"><span data-feather="arrow-left"></span> Batal</button>
	        <button type="submit" class="btn btn-primary" name="simpan"><span data-feather="save"></span> Simpan</button>
	      </div>
	    </div>
	  </div>
	</div>
</form>
<!-- End Modal Add Kegiatan -->

<?php $no = 1; ?>
<span style="margin-left: 10px;">Kegiatan : </span>

<?php foreach ($decode_kegiatan as $dk) : ?>
	<?php if($d->id == $dk->id_program) : ?>
		<!-- start kegiatan view -->
		<form class="form-inline" method="post">
			<div class="form-group mb-2">
				<label for="vkegiatan" class="sr-only">Kegiatan</label>
				<input type="text" readonly class="form-control-plaintext" id="vkegiatan" value="<?= $no++. '. ' . $dk->nama ?>" style="width: 490px;margin-left: 10px;margin-bottom: -10px;">
			</div>
			<a class="text-secondary" href="<?=base_url('pk/delete_kegiatan/' . $dk->id)?>" onclick="return confirm('Apakah anda yakin akan menghapus kegiatan ini?')"><span data-feather="trash" data-toggle="tooltip" data-placement="top" title="Hapus Kegiatan"></span></a>&nbsp;

			<a class="text-secondary" href="#" data-toggle="modal" data-target="#kegiatan<?=$d->id?>"><span data-feather="edit" data-toggle="tooltip" data-placement="top" title="Edit Kegiatan"></span></a>
		</form>
		<!-- end kegiatan view -->

		<!-- start kegiatan edit -->
		<form method="post" action="<?=base_url('pk/edit_kegiatan/' . $dk->id)?>">
			<div class="modal fade" id="kegiatan<?=$d->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLongTitle">Edit Kegiatan</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			          <div class="form-group">
			            <label class="col-form-label">Nama program :</label>
						<input type="text" readonly class="form-control-plaintext font-weight-bold" id="vprogram" value="<?= $d->nama ?>" style="width: 500px;">
			          </div>
			          <div class="form-group">
			            <label class="col-form-label">Nama kegiatan :</label>
			            <input type="hidden" name="id_program" value="<?=$d->id?>">
			            <input name="nama" type="text" class="form-control" value="<?=$dk->nama?>">
			          </div>

			      </div>
			      <div class="modal-footer">
			        <button type="reset" class="btn btn-secondary" data-dismiss="modal"><span data-feather="arrow-left"></span> Batal</button>
			        <button type="submit" class="btn btn-primary" name="update"><span data-feather="refresh-cw"></span> Update</button>
			      </div>
			    </div>
			  </div>
			</div>
		</form>

		<!-- end kegiatan edit -->

	<?php endif; ?>
<?php endforeach; ?>
<hr>
<?php endforeach; ?>


<?php else : ?>
<span class="text-danger">Program belum ditambahkan!</span>
<?php endif; ?>
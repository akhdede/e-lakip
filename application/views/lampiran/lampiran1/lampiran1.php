	<h1 class="h2">Indikator Kinerja Utama</h1>
	<div class="btn-toolbar mb-2 mb-md-0">
		<button class="btn btn-sm btn-outline-secondary">
		  <span data-feather="calendar"></span>
		  Tahun <?= $_SESSION['tahun'] ?>
		</button>
	</div>
</div>

<?php if (isset($message)): ?>
	<span class="msg"><?= $message ?></span>
<?php endif ?>

<?php 
$encode_a = json_encode($lampiran1_a->result());

$decode_a = json_decode($encode_a);

$encode_b = json_encode($lampiran1_b->result());

$decode_b = json_decode($encode_b);

$encode_c = json_encode($lampiran1_c->result());

$decode_c = json_decode($encode_c);

$count_iku = $countIku->num_rows();
?>

<?php if ($count_iku == 0): ?>

	<span class="text-danger">Table IKU belum dibuat!</span>

	<br><br>

	<a href="<?= base_url('submenu/createtableiku') ?>" class="btn btn-primary"><span data-feather="plus-circle"></span> Buat Table IKU</a>
	
<?php else: ?>

	<table class="table">
		<thead>
			<tr>
				<th>Sasaran Strategis</th>
				<th>Indikator Kinerja</th>
				<th>Target</th>
				<th>Program / Kegiatan</th>
				<th>Anggaran</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($decode_a as $da) : ?> <!-- iku -->
				<?php foreach ($decode_c as $dc) : ?> <!-- sum anggaran sub_iku -->
					<?php if ($dc->id_program == $da->id_program) : ?>		
						<tr>
							<td class="font-weight-bold"><?= $da->sasaran_strategis ?></td>
							<td class="font-weight-bold"><?= $da->indikator_kinerja ?></td>
							<td></td>
							<td class="font-weight-bold"><?= $da->program ?></td>
							<td class="font-weight-bold"><?= number_format($dc->anggaran,0,',','.') ?></td>
							<td class="font-weight-bold">
								<?php if ($da->sasaran_strategis == null or $da->indikator_kinerja == null): ?>
									<a class="text-secondary" href="#" data-toggle="modal" data-target="#iku<?=$da->id?>"><span data-feather="edit" data-toggle="tooltip" data-placement="top" title="Data harus diubah!"></span></a>
									<span data-feather="alert-triangle" class="text-warning"></span>
								<?php else: ?>
									<a class="text-secondary" href="#" data-toggle="modal" data-target="#iku<?=$da->id?>"><span data-feather="edit" data-toggle="tooltip" data-placement="top" title="Edit"></span></a>
								<?php endif ?>
							</td>
						</tr>
					<?php endif; ?>
				<?php endforeach ?>
				<?php foreach($decode_b as $db) : ?> <!-- sub_iku -->
					<tr>
						<?php if ($da->id == $db->id_iku): ?>
							<td colspan="2"></td>
							<td><?= $db->target ?></td>
							<td><?= $db->kegiatan ?></td>
							<td><?= number_format($db->anggaran,0,',','.') ?></td>
							<td class="font-weight-bold">
								<?php if ($db->anggaran == 0 || $db->target == null): ?>
									<a class="text-secondary" href="#" data-toggle="modal" data-target="#sub_iku<?=$db->id?>">
										<span data-feather="edit" data-toggle="tooltip" data-placement="top" title="Data harus diubah!"></span></a>
									<span data-feather="alert-triangle" class="text-warning"></span>
								<?php else: ?>
									<a class="text-secondary" href="#" data-toggle="modal" data-target="#sub_iku<?=$db->id?>"><span data-feather="edit" data-toggle="tooltip" data-placement="top" title="Edit"></span></a>									
								<?php endif ?>

							</td>

						<?php endif; ?>
					</tr>
				<?php endforeach; ?>
			<?php endforeach; ?>
		</tbody>

	</table>
<?php endif ?>

<?php foreach ($decode_a as $da): ?>
<!-- modal for iku -->
<form method="post">
	<div class="modal fade" id="iku<?=$da->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Edit IKU</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	          <div class="form-group">
	          	<input type="hidden" name="id" value="<?=$da->id?>">
	            <label class="col-form-label">Program :</label>
	            <br>
	            <span class="font-weight-bold"><?= $da->program?></span>
	          </div>
	          <div class="form-group">
	            <label class="col-form-label">Sasaran Strategis :</label>
	            <input type="text" class="form-control" name="sasaran_strategis" placeholder="Sasaran Strategis" value="<?= $da->sasaran_strategis?>">
	            <label class="col-form-label">Indikator Kinerja :</label>
	            <input type="text" class="form-control" name="indikator_kinerja" placeholder="Indikator Kinerja" value="<?= $da->indikator_kinerja?>">
	          </div>          
	      </div>
	      <div class="modal-footer">
	        <button type="reset" class="btn btn-secondary" data-dismiss="modal"><span data-feather="arrow-left"></span> Batal</button>
	        <button type="submit" class="btn btn-primary" name="save_iku"><span data-feather="save"></span> Save</button>
	      </div>
	    </div>
	  </div>
	</div>
</form>
<?php endforeach ?>

<?php foreach ($decode_a as $da): ?>	
	<?php foreach ($decode_b as $db): ?>
	<!-- modal for sub iku -->
	<?php if ($da->id == $db->id_iku): ?>
		<form method="post">
			<div class="modal fade" id="sub_iku<?=$db->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Edit IKU</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			          <div class="form-group">
			          	<input type="hidden" name="id" value="<?=$db->id?>">
			            <label class="col-form-label">Program :</label>
			            <br>
			            <span class="font-weight-bold"><?= $da->program?></span>
			            <br>
			            <label class="col-form-label">Kegiatan :</label>
			            <br>
			            <span class="font-weight-bold"><?= $db->kegiatan?></span>
			          </div>
			          <div class="form-group">
			            <label class="col-form-label">Target :</label>
			            <input type="text" class="form-control" name="target" placeholder="Target" value="<?= $db->target?>">
			            <label class="col-form-label">Anggaran :</label>
			            <input type="text" class="form-control" name="anggaran" placeholder="Anggaran" value="<?= $db->anggaran?>">
			          </div>          
			      </div>
			      <div class="modal-footer">
			        <button type="reset" class="btn btn-secondary" data-dismiss="modal"><span data-feather="arrow-left"></span> Batal</button>
			        <button type="submit" class="btn btn-primary" name="save_sub_iku"><span data-feather="save"></span> Save</button>
			      </div>
			    </div>
			  </div>
			</div>
		</form>
	<?php endif ?>
	<?php endforeach ?>
	<?php $id_program[] = $da->id_program?>
<?php endforeach ?>

<?php if ($count_iku != 0): ?>
	<form method="post" action="<?= base_url('submenu/deleteiku') ?>">
		<?php foreach ($id_program as $ip): ?>
			<input type="hidden" name="id_program" value="<?=$ip?>">		
		<?php endforeach ?>
		<button class="btn btn-danger" type="submit" name="delete_iku"><span data-feather="trash"></span> Delete All</button>
	</form>
<?php endif ?>
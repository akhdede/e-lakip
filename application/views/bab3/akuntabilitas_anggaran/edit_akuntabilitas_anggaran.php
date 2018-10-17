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
<?php $row = $edit->row_array() ?>

<form method="post">
	<div class="form-group">
		<input type="hidden" name="id" value="<?= $row['id'] ?>">
		<textarea id="textarea" name="konten"><?= $row['konten'] ?></textarea>
	</div>

	<button type="submit" class="btn btn-primary" name="update"><span data-feather="save"></span> Update</button>
</form>

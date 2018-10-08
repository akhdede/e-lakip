<h1 class="h2">Cara Mencapai Tujuan dan Sasaran</h1>
<div class="btn-toolbar mb-2 mb-md-0">
	<button class="btn btn-sm btn-outline-secondary">
	  <span data-feather="calendar"></span>
	  Tahun <?= $_SESSION['tahun'] ?>
	</button>
</div>
</div>
<?php if (isset($message)): ?>
<p><span class="text-danger"><?= $message ?></span></p>	
<?php endif ?>

<form method="post">
	<div class="form-group">
		<textarea id="textarea" name="konten"></textarea>
	</div>

	<button type="submit" class="btn btn-primary" name="simpan"><span data-feather="save"></span> Simpan</button>
</form>

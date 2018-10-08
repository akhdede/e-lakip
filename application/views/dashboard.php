  <h1 class="h2">Dashboard</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
      <a class="btn btn-sm btn-outline-secondary" onclick="return confirm('Apakah anda akan mendownload laporan?')" href="<?= base_url('cetak'); ?>">Export</a>
    </div>
    <button class="btn btn-sm btn-outline-secondary">
      <span data-feather="calendar"></span>
      Tahun <?= $_SESSION['tahun'] ?>
    </button>
  </div>
</div>
<h1 class="h5">Persentase Pekerjaan</h1>
<?php $selesai = $persen_selesai->row_array() ?>
<?php $sedang = $persen_sedang->row_array() ?>
<?php $belum = $persen_belum->row_array() ?>

<div class="progress" style="height: 30px;">
  <div class="progress-bar bg-success" role="progressbar" style="width: <?= $selesai['persen'] . '%' ?>" aria-valuenow="<?= $selesai['persen'] ?>" aria-valuemin="0" aria-valuemax="100"><?= number_format($selesai['persen'], 2) . '%' ?></div>

  <div class="progress-bar bg-warning" role="progressbar" style="width: <?= $sedang['persen'] . '%' ?>" aria-valuenow="<?= $sedang['persen'] ?>" aria-valuemin="0" aria-valuemax="100"><?= number_format($sedang['persen'], 2) . '%' ?></div>

  <div class="progress-bar bg-danger" role="progressbar" style="width: <?= $belum['persen'] . '%' ?>" aria-valuenow="<?= $belum['persen'] ?>" aria-valuemin="0" aria-valuemax="100"><?= number_format($belum['persen'], 2) . '%' ?></div>
</div>
<p><hr></p>
<h1 class="h5">Detail Pekerjaan</h1>
<div class="row" style="padding: 5px 20px;">
  <div class="col-6 font-weight-bold" style="padding: 5px;">Nama Pekerjaan</div>
  <div class="col-2 font-weight-bold" style="padding: 5px;">Status</div>
  <div class="col-4 font-weight-bold" style="padding: 5px;">Keterangan</div>
  <?php $menu_dashboard = $menu_dashboard->result() ?>
  <?php $submenu_dashboard = $submenu_dashboard->result() ?>
  <?php foreach ($menu_dashboard as $m): ?>
      <div class="col-6" style="border-top: 1px solid #c0c0c0; padding: 5px;"><?= $m->nama ?></div>
      <div class="col-2" style="border-top: 1px solid #c0c0c0; padding: 5px;">
        <?php
        $id_menu = array();
        foreach ($single_menu->result() as $r) {
          $id_menu[] = $r->id;
        }

        if(in_array($m->id, $id_menu)){

          if($m->selesai == 'y')
            echo '<span data-feather="check-circle" class="text-success"></span>';
          elseif($m->selesai == 'n')
            echo '<span data-feather="alert-circle" class="text-warning"></span>';
          else
            echo '<span data-feather="x-circle" class="text-danger"></span>';
        }
        ?>        
      </div>
      <div class="col-4" style="border-top: 1px solid #c0c0c0; padding: 5px;">
        <?php
        if(in_array($m->id, $id_menu)){

          if($m->selesai == 'y')
            echo 'Selesai dikerjakan';
          elseif($m->selesai == 'n')
            echo 'Sedang dikerjakan';
          else
            echo 'Belum dikerjakan';
        }

        ?>        
      </div>
    <?php foreach ($submenu_dashboard as $s): ?>
      <?php if ($m->id == $s->id_menu): ?>
        <div class="col-6" style="padding: 5px 30px;"><?= $s->nama ?></div>
        <div class="col-2" style="padding: 5px; ">
          <?php  
          if($s->selesai == 'y')
            echo '<span data-feather="check-circle" class="text-success"></span>';
          elseif($s->selesai == 'n')
            echo '<span data-feather="alert-circle" class="text-warning"></span>';
          else
            echo '<span data-feather="x-circle" class="text-danger"></span>';
          ?>                  
        </div>
        <div class="col-4" style="padding: 5px;">
        <?php  
          if($s->selesai == 'y')
            echo 'Selesai dikerjakan';
          elseif($s->selesai == 'n')
            echo 'Sedang dikerjakan';
          else
            echo 'Belum dikerjakan';
        ?>
        </div>        
      <?php endif ?>
    <?php endforeach ?>
  <?php endforeach ?>
</div>


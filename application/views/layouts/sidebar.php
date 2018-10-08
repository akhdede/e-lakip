<div class="container-fluid">
	<div class="row">
    	<nav class="col-md-2 d-none d-md-block bg-light sidebar">
      		<div class="sidebar-sticky">
        		<ul class="nav flex-column">
    				<li class="nav-item">
                		<a class="nav-link" href="<?= base_url('dashboard') ?>">
                  			DASHBOARD
                		</a>
          			</li>
        			<?php foreach ($menu->result() as $m) : ?>
        				<li class="nav-item">
	                		<a class="nav-link" href="<?= base_url($m->link) ?>">
	                  			<?= $m->nama ?>
	                		</a>
	          			</li>
        				<?php foreach ($submenu->result() as $s) : ?>
        					<?php if ($m->id == $s->id_menu): ?>     						
		        				<li class="nav-item" style="margin-left: 20px;">
			                		<a class="nav-link" href="<?= base_url($s->link) ?>">
			                  			<?= $s->nama ?>
			                		</a>
		          				</li>		 						
        					<?php endif ?>		              		
              			<?php endforeach; ?>
              		<?php endforeach; ?>
        		</ul>
      		</div>
    	</nav>        
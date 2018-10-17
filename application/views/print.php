<?php
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=" . rand() . ".doc");
header("Pragma: no-cache");
header("Expires: 0"); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Export to word</title>
</head>
<body>
<div class="container">

<?php
foreach ($menu->result() as $m) {
	if($m->selesai == 'y'){
		echo '<h3>' . $m->nama . '</h3>';
		echo $m->konten;		
	}
	elseif($m->selesai == 'n'){
		echo '<h3>' . $m->nama . '</h3>';
		echo 'Sedang dikerjakan';
	}
	else{
		echo '<h3>' . $m->nama . '</h3>';
		echo 'Belum dikerjakan';		
	}
	foreach ($submenu->result() as $s) {
		if($m->id == $s->id_menu){
			if($s->selesai == 'y'){
				echo '<h4>' . $s->nama . '</h4>';
				echo $s->konten;			
			}
			elseif($s->selesai == 'n'){
				echo '<h4>' . $s->nama . '</h4>';
				echo 'Sedang dikerjakan';
			}
			else{
				echo '<h4>' . $s->nama . '</h4>';
				echo 'Belum dikerjakan';
			}
		}
	}
}  
?>
</div>

</body>
</html>

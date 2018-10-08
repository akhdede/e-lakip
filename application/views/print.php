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
	echo '<h3>' . $m->nama . '</h3>';
	echo $m->konten;
	foreach ($submenu->result() as $s) {
		if($m->id == $s->id_menu){
			echo '<h4>' . $s->nama . '</h4>';
			echo $s->konten;	
		}
	}
}  
?>
</div>

</body>
</html>

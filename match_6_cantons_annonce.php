<!DOCTYPE HTML>
<?php
function getFileDateTime($filename){
	if (file_exists(dirname(__FILE__).'/'.$filename)) {
		return date("j.n.Y H:i", filemtime(dirname(__FILE__).'/'.$filename));
	}
}
$txt_filename = "annonce.txt";
?>
<html>
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<meta http-equiv="refresh" content="10; url=match_6_cantons_man.php" />
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Match des 6 cantons 2018</title>
	<link rel="icon" type="image/png" href="ana_icon.png">

</head>

<body>
	<div class="row">
		<div class="column left">
			<?php include("clock.html"); ?>
		</div>
		<div class="column middle">
	<div id="corps">
		<div class="card"><img src="images/logo_ana.png" align="top" alt="ANA" height="70" width="82"></div>
		<h1 align="center">Match des 6 cantons 2018</h1>
		<h2 align="center">Annonces</h2>
		<div id="annonce">
			<p><?php include($txt_filename); ?></p>
		</div>
		<p>mis à jour à <?php print getFileDateTime($txt_filename); ?></p>
</div>
</div>
<div class="column right" ></div>
</div>
</body>
</html>

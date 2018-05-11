<!DOCTYPE HTML>

<html>
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<meta http-equiv="refresh" content="10; url=match_6_cantons_meteo.php" />
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
		<p><img src="images/logo_ana.png" align="top" alt="ANA" height="70" width="82"></p>
		<h1 align="center">Match des 6 cantons 2018</h1>
		<h2 align="center"></h2>

		<time>
		<script>
		var currentdate = new Date();
		var heure = currentdate.getHours();
		var minute = currentdate.getMinutes();
		if (heure < 10) {
			heure = "0" + heure;
		}
		if (minute < 10) {
			minute = "0" + minute;
		}
		var datetime = heure + ":" + minute;
		document.write(datetime);
		</script>
	</time>
</div>
<div class="column right" ></div>
</div>
</body>
</html>

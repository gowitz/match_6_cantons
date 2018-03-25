<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<?php
function getFileDateTime($filename){
	if (file_exists(dirname(__FILE__).'/'.$filename)) {
		return date("j.n.Y H:i", filemtime(dirname(__FILE__).'/'.$filename));
	}
}
$db_filename = "match_6_cantons.sqlite";

try{
		$pdo = new PDO('sqlite:'.dirname(__FILE__).'/'.$db_filename);
		$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // ERRMODE_WARNING | ERRMODE_EXCEPTION | ERRMODE_SILENT
} catch(Exception $e) {
		echo "Impossible d'accéder à la base de données SQLite : ".$e->getMessage();
		die();
}
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
	<div id="corps">
		<div class="card"><img src="images/logo_ana.png" align="top" alt="ANA" height="70" width="82"></div>
		<h1 align="center">Match des 6 cantons 2018</h1>
		<h2 align="center">Classement global</h2>

<table align="center" cellspacing="0" border="0">
	<colgroup width="142"></colgroup>
	<colgroup span="6" width="81"></colgroup>
	<tr>
		<td align="center" class="bg"></td>
		<td align="center" class="bg">Fribourg</td>
		<td align="center" class="bg">Genève</td>
		<td align="center" class="bg">Jura</td>
		<td align="center" class="bg">Neuchâtel</td>
		<td align="center" class="bg">Valais</td>
		<td align="center" class="bg">Vaud</td>
	</tr>
	<tr>
		<td align="center" height="50" class="bg"></td>
		<td align="center" height="50" class="bg"><img src="images/fribourg.png" align="top" alt="Fribourg" height="32" width="32"></td>
		<td align="center" height="50" class="bg"><img src="images/geneve.png" align="top" alt="Genève" height="32" width="32"></td>
		<td align="center" height="50" class="bg"><img src="images/jura.png" align="top" alt="Jura" height="32" width="32"></td>
		<td align="center" height="50" class="bg"><img src="images/neuchatel.png" align="top" alt="Neuchâtel" height="32" width="32"></td>
		<td align="center" height="50" class="bg"><img src="images/valais.png" align="top" alt="Valais" height="32" width="32"></td>
		<td align="center" height="50" class="bg"><img src="images/vaud.png" align="top" alt="Vaud" height="32" width="32"></td>
	</tr>
	<tr>
		<?php
		$cat = 'MAN';
		$subtotal = $pdo->query('SELECT pts FROM classement WHERE categorie LIKE \''.$cat.'\' ORDER BY canton');
		?>
			<td class="bg bold" align="left">Total points <?php echo $cat; ?></td>
			<?php
				foreach ($subtotal as $row) {
					print "	<td class=\"bg bold\" align=\"center\">".$row['pts']."</td>";
				}
				?>
		</tr>
		<tr>
			<?php
			$cat = 'WOM';
			$subtotal = $pdo->query('SELECT pts FROM classement WHERE categorie LIKE \''.$cat.'\' ORDER BY canton');
			?>
				<td class="bg bold" align="left">Total points <?php echo $cat; ?></td>
				<?php
					foreach ($subtotal as $row) {
						print "	<td class=\"bg bold\" align=\"center\">".$row['pts']."</td>";
					}
					?>
			</tr>
	<tr>
		<td height="10" align="center"></td>
		<td height="10" align="center"></td>
		<td height="10" align="center"></td>
		<td height="10" align="center"></td>
		<td height="10" align="center"></td>
		<td height="10" align="center"></td>
		<td height="10" align="center"></td>
	</tr>
	<tr>
		<td class="bg" align="left">Totaux</td>
		<?php
		$subtotal = $pdo->query('SELECT sum(pts) AS pts FROM classement GROUP BY canton ORDER BY canton');
		foreach ($subtotal as $row) {
			print "	<td class=\"bg bold\" align=\"center\">".$row['pts']."</td>";
		}
		?>
	</tr>
	<tr>
		<td height="10" align="center"></td>
		<td height="10" align="center"></td>
		<td height="10" align="center"></td>
		<td height="10" align="center"></td>
		<td height="10" align="center"></td>
		<td height="10" align="center"></td>
		<td height="10" align="center"></td>
	</tr>
	<tr>
		<td class="bg" align="left">Rang</td>
		<td class="bg" align="center">4</td>
		<td class="bg" align="center">3</td>
		<td class="bg" align="center">5</td>
		<td class="bg" align="center">6</td>
		<td class="bg" align="center">2</td>
		<td class="bg" align="center">1</td>
	</tr>
</table>
<p>mis à jour à <?php print getFileDateTime($db_filename); ?></p>
</div>
</body>
</html>

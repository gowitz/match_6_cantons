<!DOCTYPE HTML>
<?php
function getFileDateTime($filename){
	if (file_exists(dirname(__FILE__).'/'.$filename)) {
		return date("j.n.Y H:i", filemtime(dirname(__FILE__).'/'.$filename));
	}
}
$cat = 'WOM';
$db_filename = "match_6_cantons.sqlite";
?>
<html>
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<meta http-equiv="refresh" content="10; url=match_6_cantons_res.php" />
	<title>Match des 6 cantons 2018</title>
	<link rel="stylesheet" type="text/css" href="style.css">
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
		<h1>Match des 6 cantons 2018</h1>
		<h2>Classement femmes</h2>
		<?php
		try{
		    $pdo = new PDO('sqlite:'.dirname(__FILE__).'/'.$db_filename);
		    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
		    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // ERRMODE_WARNING | ERRMODE_EXCEPTION | ERRMODE_SILENT
		} catch(Exception $e) {
		    echo "Impossible d'accéder à la base de données SQLite : ".$e->getMessage();
		    die();
		}
		// Querying
		$result = $pdo->query('SELECT * FROM resultats_table WHERE categorie LIKE \''.$cat.'\'');
		?>
<div id="res">
<table align="center" cellspacing="0" border="0">
	<colgroup width="142"></colgroup>
	<colgroup span="6" width="81"></colgroup>
	<tr>
		<th align="center" class="bg"></th>
		<th align="center" class="bg">Fribourg</th>
		<th align="center" class="bg">Genève</th>
		<th align="center" class="bg">Jura</th>
		<th align="center" class="bg">Neuchâtel</th>
		<th align="center" class="bg">Valais</th>
		<th align="center" class="bg">Vaud</th>
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
	<?php
		foreach ($result as $row) {
			$cat = $row['categorie'];
			$disc = $row['discipline'];
			$pts = $row['pts'];
			$pts_c = explode(",", $pts);
			print "<tr>";
			print "	<td align=\"left\">$disc</td>";
			foreach ($pts_c as $c) {
				print "<td align=\"center\">$c</td>";
			}
			print "</tr>";
		}
		?>
	<tr>
		<td height="10" align="center"></td>
		<td height="10" align="center"></td>
		<td height="10" align="center"></td>
		<td height="10" align="center"></td>
		<td height="10" align="center"></td>
		<td height="10" align="center"></td>
		<td height="10" align="center"></td>
	</tr>
	<?php
	$subtotal = $pdo->query('SELECT pts FROM classement WHERE categorie LIKE \''.$cat.'\' ORDER BY canton');
	?>
	<tr>
		<td class="bg bold" align="left">Total points <?php echo $cat; ?></td>
		<?php
			foreach ($subtotal as $row) {
				print "	<td class=\"bg bold\" align=\"center\">".$row['pts']."</td>";
			}
			?>
	</tr>
</table>
</div>
<p>mis à jour à <?php print getFileDateTime($db_filename); ?></p>
</div>
<div class="column right" ></div>
</div>
</body>
</html>

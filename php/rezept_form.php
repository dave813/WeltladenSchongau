<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Weltladen Schongau</title>
		<link rel="stylesheet" href="../design.css">
		<script src="../js/jquery.PrintArea.js" type="text/javascript"></script>
		<script type="text/javascript" src="../js/jquery-1.9.0.js"></script>
		<script type="text/javascript">
			var aktopen = null;
			function descopen(openobj) {
				if (aktopen != null) {
					$(aktopen).slideToggle();
				}
				if (aktopen != openobj) {
					$(openobj).slideToggle();
				}
				if (openobj == aktopen) {
					aktopen = null;
				} else {
					aktopen = openobj;
				}
			}
		</script>
		<script type="text/javascript">
			$(function() {

				$('.druckzeichen').click(function() {
					var container = $(this).attr('rel');
					$('#' + container).printArea();
					return false;
				});

			});
		</script>
	</head>
	<body>
		<div id="homepage">
			<div id="überheader">

			</div>
			<div id="header">
				<a href="../index.html"><img src="../img/header.jpg" /></a>

			</div>

			<div id="home">
				<div id="menue">
					<a href="../weltladen.html"><img src="../weltladen/weltladen_bild.jpg"></a>
					<div id="menuetext">
						<h4><a href="../weltladen_bilder.html">&#9658 Bilder</a></h4>
						<h4><a href="../weltladen_sortiment.html">&#9658 Sortiment </a></h4>
						<h4><a href="../weltladen_rezepte.html">&#9658 Rezepte</a></h4>
						<p>
							&nbsp;
						</p>
						<h4><h4><a href="../index.html">&#9658 Home</a></h4><h4><a href="../veranstaltungen.html">&#9658 Veranstaltungen</a></h4><h4><a href="../verein.html">&#9658 Unser Verein</a></h4><h4><a target="_blank" href="http://www.entwicklungsland-bayern.de/eine-welt-stationen/">&#9658 Eine Welt-Station</a></h4><h4><a href="../netzwerk.html">&#9658 Netzwerksarbeit</a></h4></h4>
					</div>
				</div>

				<div id="inhalt">
					<h1>Renates Rezepte</h1>
					<h4>&nbsp;</h4>

					<?php
					$conn=mysql_connect("db41.mdh.web.de","dbo384090965","Hochplatte10");
					if(!$conn) {
					echo "Unable to connect to DB: ".mysql_error();
					exit ;
					}
					if(!mysql_select_db("db384090965")) {
					echo "Unable to select mydbname: ".mysql_error();
					exit ;
					}
					$sql="SELECT * from recipe order by idrecipe desc";
					$result=mysql_query($sql);
					if(!$result) {
					echo "Could not successfully run query ($sql) from DB: ".mysql_error();
					exit ;
					}
					if(mysql_num_rows($result)==0) {
					echo "No rows found, nothing to print so am exiting";
					exit ;
					}
					// While a row of data exists, put that row in $row as an associative array
					// Note: If you're expecting just one row, no need to use a loop
					// Note: If you put extract($row); inside the following loop, you'll
					//       then create $userid, $fullname, and $userstatus
					$rec=1;
					$CRLF="\n";
					while($row=mysql_fetch_assoc($result)) {
					echo '<div class="rec_main">'.$CRLF;
					echo '<div id="druck'.$rec.'">'.$CRLF;
					echo '<div class="rec_title" onclick="descopen(\'#rec'.$rec.'\')"><h2><span class="hover">'.$row["title"].'</span></h2></div>'.$CRLF;
					echo '<div class="rec_desc" id="rec'.$rec.'">'.$CRLF;
					echo '<div class="druckzeichen"><img src="../img/drucken.gif" /></div>'.$CRLF;
					echo $row["recipetext"].$CRLF;
					echo "</div></div></div>".$CRLF;
					/*echo "<table class='ausgabetab'>" . "<tr>" . "<td>" . "Titel:" . "</td>" . "<td>" . $row["title"] . "</td>" . "</tr>";
					 echo "<tr>" . "<td>" . "Ersteller:" . "</td>" . "<td>" . $row["creator"] . "</td>" . "</tr>";
					 echo "<tr>" . "<td>" . "Rezepttext:" . "</td>" . "<td>" . $row["recipetext"] . "</td>" . "</tr>";
					 echo "<tr>" . "<td>" . "Aktiv:" . "</td>" . "<td>" . $row["recipeactive"] . "</td>" . "</tr>" . "</table>";*/
					$rec++;
					}
					mysql_free_result($result);
				?>
					<hr />

					<h2>Alle, mit *
					gekennzeichneten Lebensmittel erhalten Sie im Weltladen.
					<br />
					Guten Appetit!</h2>

				</div>

			</div>

			<div id="footer">
				<a href="../impressum.html"><img src="../img/hp_fuss.jpg"></a>

			</div>
		</div>
	</body>
</html>


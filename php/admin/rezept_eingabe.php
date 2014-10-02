<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link type="text/css" href="../css/rezeptcms.css" />
    <script src="../../ckeditor/ckeditor.js"></script>
    
</head>
<body>
	
<?php
$conn = mysql_connect("db41.mdh.web.de", "dbo384090965", "Hochplatte10");

if (!$conn) {
    echo "Unable to connect to DB: " . mysql_error();
    exit ;
}

if (!mysql_select_db("db384090965")) {
    echo "Unable to select mydbname: " . mysql_error();
    exit ;
}

$sql = "SELECT * from recipe";

$result = mysql_query($sql);

if (!$result) {
    echo "Could not successfully run query ($sql) from DB: " . mysql_error();
    exit ;
}

if (mysql_num_rows($result) == 0) {
    echo "No rows found, nothing to print so am exiting";
    exit ;
}

$id = "";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
// While a row of data exists, put that row in $row as an associative array
// Note: If you're expecting just one row, no need to use a loop
// Note: If you put extract($row); inside the following loop, you'll
//       then create $userid, $fullname, and $userstatus
$CRLF = "\n";
$creator = "";
$title = "";
$recipeText = "";
while ($row = mysql_fetch_assoc($result)) {
    echo '<h2><a href="rezept_eingabe.php?id=' . $row["idrecipe"] . '">' . $row["title"] . '</a></h2>' . $CRLF;
    if ($id != "" && $id == $row["idrecipe"]) {
        $creator = $row["creator"];
        $title = $row["title"];
        $recipeText = $row["recipetext"];
    }
}
echo '<h2><a href="rezept_eingabe.php">Neues Rezept</a></h2>' . $CRLF;

mysql_free_result($result);

?>
<form method="post" action="rezept_controller.php" >
    <table class="ausgabetab">
        <tr><td>ID:</td><td><input name="idrecipe"  type="text" value="<?php echo $id; ?>"></td></tr>        
        <tr><td>Titel:</td><td><input name="title" type="text" value="<?php echo $title; ?>"></input></td></tr>
        <tr><td>Ersteller:</td><td><input name="creator" type="text" value="<?php echo $creator; ?>"></input></td></tr>
        <tr><td>Rezepttext:</td><td><textarea class="ckeditor" name="recipetext"><?php echo $recipeText ?></textarea></td></tr>
        <tr><td><input type="submit" /></td></tr>
    </table>
</form>


</body>
</html>
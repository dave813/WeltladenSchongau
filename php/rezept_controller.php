<?php
$conn = mysql_connect("127.0.0.1", "lampp", "test");

if (!$conn) {
    echo "Unable to connect to DB: " . mysql_error();
    exit;
}

if (!mysql_select_db("weltladen")) {
    echo "Unable to select mydbname: " . mysql_error();
    exit;
}


$sql = "INSERT INTO recipe (title, creator, recipetext, recipeactive) VALUES ('".
$_POST['title']."', '". $_POST['creator']."','". $_POST['recipetext']."', 0)";

if (!mysql_query($sql,$conn))
  {
  die('Error: ' . mysql_error($conn) . "</br>" . $sql);
  }
echo "1 record added";


mysqli_close($conn);
header( 'Location: rezept_form.php' ) ;

?>
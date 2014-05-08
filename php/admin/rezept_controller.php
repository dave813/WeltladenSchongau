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
$id="";
# foreach($_POST as $k=>$v) echo $k . ' -> ' . $v;
if(isset($_POST['idrecipe'])) {
$id=$_POST['idrecipe'];
$sql="UPDATE recipe set title = '".htmlentities($_POST['title'],ENT_HTML5,"UTF-8")."', creator = '".$_POST['creator']."', recipetext = '".$_POST['recipetext']."' WHERE idrecipe = ".intval($id);
} else {
$sql="INSERT INTO recipe (title, creator, recipetext, recipeactive) VALUES ('".htmlentities($_POST['title'],ENT_HTML5,"UTF-8")."', '".$_POST['creator']."','".$_POST['recipetext']."',' 0)";
}
if(!mysql_query($sql,$conn)) {
die('Error: '.mysql_error($conn)."</br>".$sql);
}
mysql_close($conn);
header('Location: rezept_eingabe.php?id='.$id);
?>
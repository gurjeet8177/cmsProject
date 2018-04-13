<?php ob_start(); ?>
<?php

// access the current session
require_once('auth.php');


?>

<?php
$page_title=null;
$page_title="Main Menu";
require_once('header.php');
?>

<?php

// name
$name = $_FILES['upload']['name'];
echo "Name $name<br >";

// size
$size = $_FILES['upload']['size'];
echo "Size $size<br />";

// type
$type = $_FILES['upload']['type'];
echo "Type $type<br />";

// get the temp location
$tmp_name = $_FILES['upload']['tmp_name'];
echo "Tmp Name $tmp_name<br />";

// copy file to the uploads folder where it will stay permanently
move_uploaded_file($tmp_name, "uploads/$name");


// get the temp location

$final_name=$name;


require('db.php');
//tell database which value we need

$sql="UPDATE images SET image_id=1,image_name=:final_name WHERE image_id=1";
$cmd=$conn->prepare($sql);
$cmd->bindParam(':final_name', $final_name, PDO::PARAM_STR);
$cmd->execute();
echo'image saved with name '.$final_name;
header('location: default.php');
?>
</body>
<?php ob_flush(); ?>
</html>
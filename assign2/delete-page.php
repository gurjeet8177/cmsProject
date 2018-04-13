<?php ob_start();// to buffer page to not print html stuff
?>
<?php

// access the current session
session_start();

// check if there is a user identity stored in the session object
require_once('auth.php');

?>
<html>
<head>
    <title>php delete</title>
</head>
<body>
<?php

$page_id=$_GET['page_id'];
//echo $movie_id;

require('db.php');

$sql="DELETE  FROM pages WHERE page_id=:page_id";

$cmd=$conn->prepare($sql);
$cmd->bindParam(':page_id', $page_id, PDO::PARAM_INT);

$cmd->execute();
//echo"Deleted succesful";
$conn=null;
header('location:default.php');
?>
</body>
<?php ob_flush(); ?>
</html>
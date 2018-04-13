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

$user_id=$_GET['user_id'];
//echo $movie_id;

require('db.php');

$sql="DELETE  FROM users WHERE user_id=:user_id";

$cmd=$conn->prepare($sql);
$cmd->bindParam(':user_id', $user_id, PDO::PARAM_INT);

$cmd->execute();
//echo"Deleted succesful";
$conn=null;
header('location:users.php');
?>
</body>
<?php ob_flush(); ?>
</html>
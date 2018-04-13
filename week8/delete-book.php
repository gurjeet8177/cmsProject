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

$book_id=$_GET['book_id'];
//echo $movie_id;

require('db.php');

$sql="DELETE  FROM books WHERE book_id=:book_id";

$cmd=$conn->prepare($sql);
$cmd->bindParam(':book_id', $book_id, PDO::PARAM_INT);

$cmd->execute();
//echo"Deleted succesful";
$conn=null;
header('location:books.php');
?>
</body>
<?php ob_flush(); ?>
</html>
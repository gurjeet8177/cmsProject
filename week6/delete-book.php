<?php ob_start();// to buffer page to not print html stuff
?>
<?php

// access the current session
session_start();

// check if there is a user identity stored in the session object
if (empty($_SESSION['user_id'])) {
// if there is no user_id in the session, redirect the user to the login page
    header('location:login.php');
    exit();
}

?>
<html>
<head>
    <title>php delete</title>
</head>
<body>
<?php

$book_id=$_GET['book_id'];
//echo $movie_id;

$conn= new PDO('mysql:host=sql.computerstudi.es;dbname=gc200354737','gc200354737','SRQWYy5T');


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
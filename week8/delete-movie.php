<?php ob_start();// to buffer page to not print html stuff
?>
<?php

// access the current session
require_once('auth.php');

?>
<html>
    <head>
    <title>php</title>
    </head>
    <body>
<?php

$movie_id=$_GET['movie_id'];
//echo $movie_id;

$conn= new PDO('mysql:host=sql.computerstudi.es;dbname=gc200354737','gc200354737','SRQWYy5T');
    

$sql="DELETE  FROM movies WHERE movie_id=:movie_id";
 
$cmd=$conn->prepare($sql);
$cmd->bindParam(':movie_id', $movie_id, PDO::PARAM_INT);

$cmd->execute();
//echo"Deleted succesful";
$conn=null;
header('location:movies.php');
?>
    </body>
    <?php ob_flush(); ?>
    </html>
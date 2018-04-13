<?php ob_start(); ?>
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
<!DOCTYPE html>
<html>


    <head>
        <title>Movie title</title>
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

 
<!-- Latest   jQuery -->
<script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
    
<body>
    <?php
    //connect to datbase
    $conn= new PDO('mysql:host=sql.computerstudi.es;dbname=gc200354737','gc200354737','SRQWYy5T');
    
    //tell database which value we need
     $sql="SELECT * FROM movies";
    $cmd=$conn->prepare($sql);
    $cmd->execute();
    $movies=$cmd->fetchAll();
   
    //loo through result and desplay each time
    echo '<table class="table table-striped table hover"><thead><th>ID</th> <th>title</th> <th>year</th><th>length</th><th>url</th><th>Edit</th><th>delete</th></thead><tbody>';
    foreach($movies as $currentMovie){
        
        echo '<tr><td>'.$currentMovie[0].'</td>
        <td>'.$currentMovie['title'].'</td>
        <td>'.$currentMovie['year'].'</td>
        <td>'.$currentMovie['length'].'</td>
        <td>'.$currentMovie['url'].'</td>
         <td><a href="movie.php?movie_id=' . $currentMovie['movie_id'] . '">Edit</a></td>
        
        <td><a onclick="return confirm(\'Are you sure you want to delete this movie?\');" href="delete-movie.php?movie_id='.$currentMovie[0].'">Delete</a></td>';
       
        //echo $currentMovie[0] would also run fine ,title tells 
    }
    //end data
    $conn=null;
    ?>

    </body>

    </html>
<?php ob_flush(); ?>
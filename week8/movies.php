<?php ob_start(); ?>
<?php

require_once('auth.php');


?>

    <?php
$page_title=null;
$page_title="ALL movies";

    //embed header
    require_once('header.php');
    //connect to datbase
require('db.php');

//tell database which value we need
     $sql="SELECT * FROM movies";
    $cmd=$conn->prepare($sql);
    $cmd->execute();
    $movies=$cmd->fetchAll();
   echo '<a href="movie.php" title="add a movie">Add a NEW movie</a>';
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

<?php
require_once('footer.php');
?>
<?php ob_flush(); ?>
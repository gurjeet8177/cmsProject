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
        <title>Books </title>
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
    $sql="SELECT * FROM books";
    $cmd=$conn->prepare($sql);
    $cmd->execute();
    $books=$cmd->fetchAll();

    //loo through result and desplay each time
    echo '<table class="table table-striped table hover"><thead><th>ID</th> <th>title</th> <th>year</th><th>author</th><th>Edit</th><th>delete</th></thead><tbody>';
    foreach($books as $currentBook){

        echo '<tr><td>'.$currentBook[0].'</td>
        <td>'.$currentBook['title'].'</td>
        <td>'.$currentBook['year'].'</td>
        <td>'.$currentBook['author'].'</td>
        
         <td><a href="book.php?book_id=' . $currentBook['book_id'] . '">Edit</a></td>
        
        <td><a onclick="return confirm(\'Are you sure you want to delete this book?\');" href="delete-book.php?book_id='.$currentBook[0].'">Delete</a></td>';

        //echo $currentMovie[0] would also run fine ,title tells
    }
    //end data
    $conn=null;
    ?>

    </body>

    </html>
<?php ob_flush(); ?>
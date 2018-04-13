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

    <?php
$page_title=null;
$page_title=" All Books";

    //embed header
    require_once('header.php');
    //connect to datbase
require('db.php');
try{
    //tell database which value we need
    $sql="SELECT * FROM books";
    $cmd=$conn->prepare($sql);
    $cmd->execute();
    $books=$cmd->fetchAll();
    echo '<a href="book.php" title="add a book">Add a NEW Book</a>';
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
}
catch (Exception $e) {
    header('location:error.php');
    mail('gurjeet8177@gmail.com', 'COMP1006 Web App Error', $e);
}

    ?>

<?php
require_once('footer.php');
?>
<?php ob_flush(); ?>
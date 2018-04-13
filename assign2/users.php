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
$page_title=" All Users";

    //embed header
    require_once('header.php');
    //connect to datbase
require('db.php');
    //tell database which value we need
    $sql="SELECT * FROM users";
    $cmd=$conn->prepare($sql);
    $cmd->execute();
    $users=$cmd->fetchAll();
    echo '<a href="user.php" title="add a book">Add a NEW User</a>';
    //loo through result and desplay each time
    echo '<table class="table table-striped table hover"><thead><th>ID</th> <th>Username</th> <th>Password</th><th>Edit</th><th>delete</th></thead><tbody>';
    foreach($users as $currentUser){

        echo '<tr><td>'.$currentUser['user_id'].'</td>
        <td>'.$currentUser['username'].'</td>
        <td>'.$currentUser['password'].'</td>
        
        
         <td><a href="user.php?user_id=' . $currentUser['user_id'] . '">Edit</a></td>
        
        <td><a onclick="return confirm(\'Are you sure you want to delete this user?\');" href="delete-user.php?user_id='.$currentUser[0].'">Delete</a></td>';

        //echo $currentMovie[0] would also run fine ,title tells
    }
    //end data
    $conn=null;
    ?>

<?php
require_once('footer.php');
?>
<?php ob_flush(); ?>
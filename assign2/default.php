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
$page_title=" default";

//embed header
$page_id=$_GET['page_id'];
if(empty($page_id)){
$page_id=6;}
require_once('header.php');
//connect to datbase
require('db.php');
//tell database which value we need
$sql="SELECT * FROM pages where page_id=:page_id";
$cmd=$conn->prepare($sql);
$cmd->bindParam('page_id', $page_id, PDO::PARAM_INT);
$cmd->execute();
$users=$cmd->fetchAll();
echo '<center><a href="page.php" title="add a page">Add a NEW page</a>';
//loo through result and desplay each time


foreach($users as $currentUser){

    echo '<h1>'.$currentUser['title'].'</h1>
        <h2>'.$currentUser['content'].'</h2>';

    //echo $currentMovie[0] would also run fine ,title tells
}
echo '<a onclick="return confirm(\'Are you sure you want to delete this user?\');" href="delete-page.php?page_id='.$currentUser[0].'">Delete this Page</a></br>';
echo '<a href="page.php?page_id='.$currentUser[0].' title="Edit this page">edit this page</a></center>';
//end data
$conn=null;
?>

<?php
require_once('footer.php');
?>
<?php ob_flush(); ?>
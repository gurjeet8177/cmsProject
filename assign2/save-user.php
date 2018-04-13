<?php ob_start(); ?>
<?php

// access the current session
require_once('auth.php');


?>
<?php

// store the movie_id if we are editing.  if we are adding, this value will be empty (which is ok)
$user_id = $_POST['user_id'];
// save form inputs into variables



$username = $_POST['username'];
$password=$_POST['password'];
$confirm=$_POST['confirm'];


// create a variable to indicate if the form data is ok to save or not
$ok = true;

// check each value
// validate inputs
if (empty($username)) {
    echo 'Username is required<br />';
    $ok = false;
}
if (empty($password) || (strlen($password) < 8)) {
    echo 'Password is invalid<br />';
    $ok = false;
}
if ($password != $confirm) {
    echo 'Passwords do not match<br />';
    $ok = false;
}
if ($ok) {
    // connect
    




    ///////////////
    // connect to the database
    require('db.php');
// set up the SQL INSERT command
  if(!empty($user_id)){
  	
  
        // set up the SQL UPDATE command to modify the existing movie
        $sql = "UPDATE users SET username = :username, password = :password WHERE user_id = :user_id";
	}
	else{
	$sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
	}
 
// create a command object and fill the parameters with the form values
    $cmd = $conn->prepare($sql);

    if (!empty($user_id)) {
        $cmd->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    }
     $password = password_hash($password, PASSWORD_DEFAULT);
    // execute the save

    $cmd->bindParam(':username', $username, PDO::PARAM_STR, 50);
    $cmd->bindParam(':password', $password, PDO::PARAM_STR, 255);
    $cmd->execute();
    // disconnect from the database
    $conn = null;
    header('location:users.php');
// show confirmation
    echo "user Saved";
}
?>

</body>
<?php ob_flush(); ?>
</html>
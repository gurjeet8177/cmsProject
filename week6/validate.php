<?php
session_start();
// store the inputs & hash the password
$username = $_POST['username'];
$password = $_POST['password'];
// connect
$conn = new PDO('mysql:host=sql.computerstudi.es;dbname=gc200354737', 'gc200354737', 'SRQWYy5T');

// write the query
$sql = "SELECT * FROM users WHERE username = :username";

// create the command, run the query and store the result
$cmd = $conn->prepare($sql);
$cmd->bindParam(':username', $username, PDO::PARAM_STR, 50);
$cmd->execute();
$user = $cmd->fetch();


// if count is 1, we found a matching username in the database.  Now check the password
if (password_verify($password, $user['password'])) {
    // user found

    $_SESSION['user_id'] = $user['user_id'];
    header('location:menu.php');
    //


}
else {
    // user not found
    header('location:login.php?invalid=true');
    exit();
}


$conn = null;

?>

    <!DOCTYPE html>
<html>
<header>
    <title>validate</title>
</header>
<body>


</body>
</html>
<?php ob_flush(); ?>
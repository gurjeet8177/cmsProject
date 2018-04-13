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
    <title>user input</title>


</head>

<body>
<?php

// store the movie_id if we are editing.  if we are adding, this value will be empty (which is ok)
$book_id = $_POST['book_id'];
// save form inputs into variables
$title = $_POST['title'];

$year = $_POST['year'];
$author = $_POST['author'];


// create a variable to indicate if the form data is ok to save or not
$ok = true;

// check each value
if (empty($title)) {
    // notify the user
    echo 'Title is required<br />';

    // change $ok to false so we know not to save
    $ok = false;
}

if (empty($year)) {
    // notify the user
    echo 'Year is required<br />';

    // change $ok to false so we know not to save
    $ok = false;
}
elseif (is_numeric($year) == false) {
    echo 'Year is invalid<br />';
    $ok = false;
}

if (empty($author)) {
    // notify the user
    echo 'author is required<br />';

    // change $ok to false so we know not to save
    $ok = false;
}




// check the $ok variable and save the data if $ok is still true (meaning we didn't find any errors)

if ($ok == true) {

    // move all the save code we wrote last week in here, starting with the database connection and ending with the disconnect command





    ///////////////
    // connect to the database
    $conn = new PDO('mysql:host=sql.computerstudi.es;dbname=gc200354737', 'gc200354737', 'SRQWYy5T');
    // set up the SQL INSERT command
//$sql = "INSERT INTO movies (title, year, length, url) VALUES (:title, :year, :length, :url)";
    if (empty($book_id)) {
        // set up the SQL INSERT command
        $sql = "INSERT INTO books (title, year, author) VALUES (:title, :year, :author)";
    }
    else {
        // set up the SQL UPDATE command to modify the existing movie
        $sql = "UPDATE books SET title = :title, year = :year, author = :author WHERE book_id = :book_id";
    }

// create a command object and fill the parameters with the form values
    $cmd = $conn->prepare($sql);

    if (!empty($book_id)) {
        $cmd->bindParam(':book_id', $book_id, PDO::PARAM_INT);
    }
    $cmd->bindParam(':title', $title, PDO::PARAM_STR, 50);//we are running function on cmd object we are binding them to be fixed in space and type
    $cmd->bindParam(':year', $year, PDO::PARAM_INT);
    $cmd->bindParam(':author', $author, PDO::PARAM_STR, 120);
   // $cmd->bindParam(':url', $url, PDO::PARAM_STR, 100);

// execute the command
    $cmd->execute();
    // disconnect from the database
    $conn = null;
    header('location:books.php');
// show confirmation
    echo "book Saved";
}
?>

</body>
<?php ob_flush(); ?>
</html>
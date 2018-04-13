<?php ob_start(); ?>
<?php

// access the current session
require_once('auth.php');

?>

<?php
$page_title=null;
$page_title="Add User";

require_once('header.php');

// store the movie_id if we are editing.  if we are adding, this value will be empty (which is ok)
$page_id = $_POST['page_id'];
// save form inputs into variables
$title = $_POST['title'];

$content = $_POST['content'];
//$length = $_POST['length'];
//$url = $_POST['url'];


// create a variable to indicate if the form data is ok to save or not
$ok = true;

// check each value
if (empty($title)) {
    // notify the user
    echo 'Title is required<br />';

    // change $ok to false so we know not to save
    $ok = false;
}

if (empty($content)) {
    // notify the user
    echo 'content is required<br />';

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
    if (empty($page_id)) {
        // set up the SQL INSERT command
        $sql = "INSERT INTO pages (title, content) VALUES (:title, :content)";
    }
    else {
        // set up the SQL UPDATE command to modify the existing movie
        $sql = "UPDATE pages SET title = :title, content = :content WHERE page_id = :page_id";
    }

// create a command object and fill the parameters with the form values
    $cmd = $conn->prepare($sql);

    if (!empty($page_id)) {
        $cmd->bindParam(':page_id', $page_id, PDO::PARAM_INT);
    }
    $cmd->bindParam(':title', $title, PDO::PARAM_STR, 200);//we are running function on cmd object we are binding them to be fixed in space and type

    $cmd->bindParam(':content', $content, PDO::PARAM_STR, 11100);

// execute the command
    $cmd->execute();
    // disconnect from the database
    $conn = null;
    header('location: default.php');
// show confirmation
   
}
?>

</body>
<?php ob_flush(); ?>
</html>
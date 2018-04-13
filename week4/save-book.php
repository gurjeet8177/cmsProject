<?php
$title = $_POST['title'];
$year = $_POST['year']; 
 
$author = $_POST['author'];

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

    // connect to the database
$conn = new PDO('mysql:host=sql.computerstudi.es;dbname=gc200354737', 'gc200354737', 'SRQWYy5T');
    // set up the SQL INSERT command
$sql = "INSERT INTO books(title, year, author) VALUES (:title, :year,  :author)";

// create a command object and fill the parameters with the form values
$cmd = $conn->prepare($sql);
$cmd->bindParam(':title', $title, PDO::PARAM_STR, 50);
$cmd->bindParam(':year', $year, PDO::PARAM_INT);
$cmd->bindParam(':author', $author, PDO::PARAM_STR, 100);

// execute the command
$cmd->execute();
    // disconnect from the database
$conn = null;

// show confirmation
echo "book Saved";
    
}
    ?>
    
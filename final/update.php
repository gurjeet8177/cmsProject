<?php ob_start();

require_once ('header.php');
?>

     <?php 
    
    // store the movie_id if we are editing.  if we are adding, this value will be empty (which is ok)
$hotel_id = $_POST['hotel_id'];
// save form inputs into variables 
$name = $_POST['name'];

$address = $_POST['address']; 
$rating = $_POST['rating']; 
$photo = $_POST['photo'];
    
    
    // create a variable to indicate if the form data is ok to save or not


    
    
    
    ///////////////
    // connect to the database
require('db.php') ; // set up the SQL INSERT command
    
        // set up the SQL UPDATE command to modify the existing movie
        $sql = "UPDATE hotels SET name = :name, address = :address, rating = :rating, photo = :photo WHERE hotelId = :hotel_id";
    
    
// create a command object and fill the parameters with the form values
$cmd = $conn->prepare($sql); 
    
    
        $cmd->bindParam(':hotel_id', $hotel_id, PDO::PARAM_INT);
  
$cmd->bindParam(':name', $name, PDO::PARAM_STR, 500);//we are running function on cmd object we are binding them to be fixed in space and type
$cmd->bindParam(':address', $address, PDO::PARAM_STR,300);
$cmd->bindParam(':rating', $rating, PDO::PARAM_INT);
$cmd->bindParam(':photo', $photo, PDO::PARAM_STR, 100);

// execute the command
$cmd->execute();
    // disconnect from the database
$conn = null;
    
   
    
header('location:default.php');
// show confirmation

    
    


require_once('footer.php');
ob_flush();
?>

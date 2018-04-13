

<?php
$fname=$_POST['fname'];

$lname=$_POST['lname'];
$email=$_POST['email'];
$address=$_POST['address'];
$city=$_POST['city'];
$date_of_birth=$_POST['date_of_birth'];
 //echo $fname;
//echo $lname.'is the last anme';

//echo $date_of_birth; 

//setting flag which if is flase would not let the code run
//it would be used in each if statement
$flag = true;

//validation goes here
//validating form data by using empty function 
if (empty($fname)) {
   
    echo 'First name Missing<br />';
    
    
    $flag = false;
}

if (empty($lname)) {
   
    echo 'last name Missing<br />';
    
    
    $flag = false;
}

if (empty($email)) {
    
    echo 'email is Missing<br />';
    
   
    $flag = false;
}

if (empty($address)) {
   
    echo 'Address is  Missing<br />';
    
    
    $flag = false;
}

if (empty($city)) {
   
    echo 'City name is Missing<br />';
    
    
    $flag = false;
}

if (empty($date_of_birth)) {
    
    echo 'Date of Birth is Missing';
    
   
    $flag = false;
}



//run below code if everythingabove is not empty

if ($flag == true) {

   //connectig to datbase using PDO
$connection = new PDO('mysql:host=sql.computerstudi.es;dbname=gc200354737','gc200354737','SRQWYy5T');
    //assigning value 
$sqlStatement = "INSERT INTO members(fname,lname,email,address,city,date_of_birth) VALUES (:fname,:lname,:email,:address,:city,:date_of_birth)";

// create a command object and fill the parameters with the form values
$cmd = $connection->prepare($sqlStatement);
    //binding parameter and putting value s in them
    
$cmd->bindParam(':fname', $fname, PDO::PARAM_STR, 30);
    $cmd->bindParam(':lname', $lname, PDO::PARAM_STR, 30);
    $cmd->bindParam(':email', $email, PDO::PARAM_STR, 70);
    $cmd->bindParam(':address', $address, PDO::PARAM_STR, 80);
    $cmd->bindParam(':email', $email, PDO::PARAM_STR, 70);
$cmd->bindParam(':date_of_birth', $date_of_birth, PDO::PARAM_INT);
$cmd->bindParam(':city', $city, PDO::PARAM_STR, 20);
$cmd->execute();
   
    ///disconecting server
$connection = null;

echo "<h1>Congrats you are a Member now</h1>";
    ///storing customized  msg in msg var 
    $msg=$fname.' congrats you are now a member of Ontario campaign ';
    //using mail function builtin
    mail($email, 'Ontarion campaign', $msg);
    
echo "<h3>An email confirming your registeration has been sent to your email</h3></br></br>";
    //to link to other page members
    echo'<a href="members.php">See other Memebers who joined</a>';
}
    ?>
    




<!DOCTYPE html>
<html>


    <head>
        <title>user input</title>
        
        
</head>
    
<body>
     <?php 
    
// save form inputs into variables 
$title = $_POST['title'];

$year = $_POST['year']; 
$length = $_POST['length']; 
$url = $_POST['url'];
    
    // connect to the database
$conn = new PDO('mysql:host=sql.computerstudi.es;dbname=gc200354737', 'gc200354737', 'SRQWYy5T');
    // set up the SQL INSERT command
$sql = "INSERT INTO movies (title, year, length, url) VALUES (:title, :year, :length, :url)";

// create a command object and fill the parameters with the form values
$cmd = $conn->prepare($sql); 
$cmd->bindParam(':title', $title, PDO::PARAM_STR, 50);//we are running function on cmd object we are binding them to be fixed in space and type
$cmd->bindParam(':year', $year, PDO::PARAM_INT);
$cmd->bindParam(':length', $length, PDO::PARAM_INT);
$cmd->bindParam(':url', $url, PDO::PARAM_STR, 100);

// execute the command
$cmd->execute();
    // disconnect from the database
$conn = null;

// show confirmation
echo "Movie Saved";
    ?>
    
</body>

    </html>
<!DOCTYPE html>
<html>

<title>Database Connection</title>
    <head>
</head>
    <?php
    
$connection = null;
$connection = new PDO('mysql:host=sql.computerstudi.es;dbname=gc200354737', 'gc200354737', 'SRQWYy5T');



if (!$connection)  {

               die('Could not connect: ');

}
else {

    echo 'connected to the database';

}
?>





<body>
</body>

    </html>
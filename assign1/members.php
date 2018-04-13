<!DOCTYPE html>
<html>


    <head>
        <title>existing members</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

 
<script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
    
<body>
    <?php
    //connect to datbase
    $conn= new PDO('mysql:host=sql.computerstudi.es;dbname=gc200354737','gc200354737','SRQWYy5T');
    //fetching al data rows from memebers
      $sql="SELECT * FROM members";
    //storing commands in cmd var
    $cmd=$conn->prepare($sql);
    $cmd->execute();
    $members=$cmd->fetchAll();
    //fetching evry thing returned from function
    
   //echoing data by looping for each row
    echo '<table class="table table-striped table hover"><thead> <th>First name</th><th>Last Name </th> <th>address</th>
     <th>Email</th>
    <th>City</th><th>date</th></thead><tbody>';
    
    
    foreach($members as $currentMember){
        
        echo '<tr><td>'.$currentMember['fname'].'</td>
        <td>'.$currentMember['lname'].'</td>
        <td>'.$currentMember['address'].'</td>
        <td>'.$currentMember['email'].'</td>
            <td>'.$currentMember['city'].'</td>
            <td>'.$currentMember['date_of_birth'].'</td>';
    
        
    }
   
    $conn=null;
    ?>

    </body>

    </html>
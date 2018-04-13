<!DOCTYPE html>
<html>


    <head>
        <title>Movie title</title>
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

 
<!-- Latest   jQuery -->
<script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
    
<body>
    <?php
    //connect to datbase
    $conn= new PDO('mysql:host=sql.computerstudi.es;dbname=gc200354737','gc200354737','SRQWYy5T');
    
    //tell database which value we need
    $sql="SELECT * FROM movies";
    $cmd=$conn->prepare($sql);
    $cmd->execute();
    $movies=$cmd->fetchAll();
    
    //loo through result and desplay each time
    echo '<table class="table table-striped table hover"><thead> <th>title</th> <th>year</th><th>length</th><th>url</th></thead><tbody>';
    foreach($movies as $currentMovie){
        
        echo '<tr><td>'.$currentMovie['title'].'</td>
        <td>'.$currentMovie['year'].'</td>
        <td>'.$currentMovie['length'].'</td>
        <td>'.$currentMovie['url'].'</td>';
        
        //echo $currentMovie[0] would also run fine ,title tells 
    }
    //end data
    $conn=null;
    ?>

    </body>

    </html>
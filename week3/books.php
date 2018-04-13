<!DOCTYPE html>
<html>


    <head>
        <title>Book Info</title>
<link type="text/css" rel="stylesheet" href="css/bootstrap-3.3.7-dist/css/bootstrap.min.css"/>
        <link type="text/css" rel="stylesheet" href="css/bootstrap-3.3.7-dist/css/bootstrap-theme.min.css"/>
</head>
    
<body>
    <?php
    //connect to datbase
    $conn= new PDO('mysql:host=sql.computerstudi.es;dbname=gc200354737','gc200354737','SRQWYy5T');
    
    //tell database which value we need
    $sql="SELECT * FROM books ORDER BY title";
    $cmd=$conn->prepare($sql);
    $cmd->execute();
    $books=$cmd->fetchAll();
    
    //loo through result and desplay each time
    echo '<table class="table table-striped table hover"><thead> <th>title</th> <th>Author</th><th>Year</th></thead><tbody>';
    foreach($books as $currentBook){
        
        echo '<tr><td>'.$currentBook['title'].'</td>
        <td>'.$currentBook['author'].'</td>
       
        <td>'.$currentBook['year'].'</td>';
        
        //echo $currentMovie[0] would also run fine ,title tells 
    }
    //end data
    $conn=null;
    ?>

    </body>

    </html>
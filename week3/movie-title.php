<!DOCTYPE html>
<html>


    <head>
        <title>Movie title</title>
</head>
    
<body>
    <?php
    //connect to datbase
    $conn= new PDO('mysql:host=sql.computerstudi.es;dbname=gc200354737','gc200354737','SRQWYy5T');
    if(!$conn){
        echo 'there is problem connecting';
    }
    else{
        echo 'connected';
    }
    //tell database which value we need
    $sql="SELECT title FROM movies";
    $cmd=$conn->prepare($sql);
    $cmd->execute();
    $movies=$cmd->fetchAll();
    //run quiry 
    //loo through result and desplay each time
    foreach($movies as $currentMovie){
        
        echo $currentMovie['title'].'<br/>';
        //echo $currentMovie[0] would also run fine ,title tells 
    }
    //end data
    $conn=null;
    ?>

    </body>

    </html>
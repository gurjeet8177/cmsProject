<!DOCTYPE html>
<html>


    <head>
        <title>Movie title</title>
<link type="text/css" rel="stylesheet" href="css/bootstrap-3.3.7-dist/css/bootstrap.min.css"/>
        <link type="text/css" rel="stylesheet" href="css/bootstrap-3.3.7-dist/css/bootstrap-theme.min.css"/>
</head>
    
<body>
    <form method="post" action="">
        <select>
            <?php
    //connect to datbase
    $conn= new PDO('mysql:host=sql.computerstudi.es;dbname=gc200354737','gc200354737','SRQWYy5T');
    
    //tell database which value we need
    $sql="SELECT * FROM books ORDER BY title";
    $cmd=$conn->prepare($sql);
    $cmd->execute();
    $books=$cmd->fetchAll();
    
    //loo through result and desplay each time
   
    foreach($books as $currentBook){
        
        echo '<option>'.$currentBook['title'].'</option>
       <option>'.$currentBook['author'].'</option>
       
        <option>'.$currentBook['year'].'</option>';
        
        //echo $currentMovie[0] would also run fine ,title tells 
    }
    //end data
    $conn=null;
    ?>
            

        </form>

    </body>

    </html>
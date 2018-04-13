<!DOCTYPE html>
<html>


    <head>
        <title>Select network</title>
</head>
    
<body>
    <form method="post" action="shows.php" >
        
    <fieldset >
                      <label for="networks"   >Network</label>
                    <select name="network_name" required >
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
    $sql="SELECT network_name FROM networks";
    $cmd=$conn->prepare($sql);
    $cmd->execute();
    $network=$cmd->fetchAll();
    //run quiry 
    //loo through result and desplay each time
    foreach($network as $currentNetwork){
          echo "<option>";   echo $currentNetwork['0'].'</option>';
    }
    //end data
    $conn=null;
    ?>
        
        </select>
    </feildset>
    <button type="submit">Get shows</button>
</form>
    </body>

    </html>
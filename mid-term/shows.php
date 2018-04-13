<!DOCTYPE html>
<html>


    <head>
        <title>Shows</title>
        <!-- Latest compiled and minified CSS -->

</head>
    
<body>
    <?php
    //connect to datbase
    $network_name=$_POST['network_name'];
    $conn= new PDO('mysql:host=sql.computerstudi.es;dbname=gc200354737','gc200354737','SRQWYy5T');
    
    //tell database which value we need
     $sql="SELECT * FROM shows WHERE network_names=:network_name";
    $cmd=$conn->prepare($sql);
     $cmd->bindParam(':network_name', $network_name, PDO::PARAM_STR);

    $cmd->execute();
    $network=$cmd->fetchAll();
   echo $network_name;
    //loo through result and desplay each time
    echo '<table ><thead>  <th>name of the show </th><th> first year</th><th>network</th></thead><tbody>';
    foreach($network as $currentNetwork){
        
        echo '<tr>
        <td>'.$currentNetwork[1].'</td>
        <td>'.$currentNetwork[2].'</td>
        <td>'.$currentNetwork[3].'</td>
        <td>'.$currentNetwork[4].'</td>
        </tr>';
        
        
    }
    //end data
    $conn=null;
    ?>

    </body>

    </html>
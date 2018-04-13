<?php ob_start(); ?>


    <?php
$page_title=null;
$page_title="ALL hotels";
$town_id=$_GET['town_id'];
    //embed header
    require_once('header.php');
    //connect to datbase
require('db.php');
//tell database which value we need
     $sql="select hotelId,name, address,rating from hotels where townId=:town_id  ";
    $cmd=$conn->prepare($sql);
     $cmd->bindParam(':town_id', $town_id, PDO::PARAM_INT);
    $cmd->execute();
    $movies=$cmd->fetchAll();
  
    //loo through result and desplay each time
    echo '<table class="table table-striped table hover"><thead><th>name</th> <th>address</th> <th>rating</th><th>edit</th></thead><tbody>';
    foreach($movies as $currentMovie){
        
        echo '<tr><td>'.$currentMovie['name'].'</td>
        <td>'.$currentMovie['address'].'</td>
       
        <td>'.$currentMovie['rating'].'</td>
       
         <td><a href="edit.php?hotel_id=' . $currentMovie[0] . '">Edit</a></td>';
        
       
        //echo $currentMovie[0] would also run fine ,title tells 
    }
    //end data
    $conn=null;
    


    ?>

<?php
require_once('footer.php');
?>
<?php ob_flush(); ?>
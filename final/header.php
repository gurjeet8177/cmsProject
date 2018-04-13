<!DOCTYPE html>
<html>
<head>
    <title><?php echo $page_title; ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">


    <!-- Latest   jQuery -->

</head>
<body>
    <nav class="navbar" >
        <a href="default.php" title="logo" class="navbar-brand">Maui hotels</a>
        <ul class="nav navbar-nav" >
       <?php 
       require('db.php');
    

    //tell database which value we need
    $sql="SELECT * FROM towns";
    $cmd=$conn->prepare($sql);
    $cmd->execute();
    $users=$cmd->fetchAll();
  
    //loo through result and desplay each time
    
    foreach($users as $currentUser)

        {
		 echo'<li><a href="hotels.php?town_id='.$currentUser['townId'].'">'.$currentUser['town'].'</a></li>';	
		}
        
       
	
          	 
            ?>

        </ul>
    </nav>

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
    <nav class="navbar" style="background-color: #0f0f0f">
        <a href="menu.php" title="logo" class="navbar-brand">SongFav.com</a>
        <ul class="nav navbar-nav" >
       <?php 
       require('db.php');
        $sqle="SELECT image_name FROM images ";
    $cmd=$conn->prepare($sqle);
    $cmd->execute();
    $images=$cmd->fetchAll();
  
    //loo through result and desplay each time
    
    foreach($images as $currentImage)
        {
		 echo ' <img src="uploads/'.$currentImage['image_name'].'"  />';
		
		}
    ?>
        
            <?php
          if(!empty($_SESSION['user_id'])) {
          	
          	
          	
          	
          	
          	
    //connect to datbase

    //tell database which value we need
    $sql="SELECT * FROM pages";
    $cmd=$conn->prepare($sql);
    $cmd->execute();
    $users=$cmd->fetchAll();
  
    //loo through result and desplay each time
    
    foreach($users as $currentUser)

        {
		 echo'<li><a  style="color: #a270c4"href="default.php?page_id=' . $currentUser['page_id'] . '">'.$currentUser['title'].'</a></li>';	
		}
        
       
	
          	 echo'
            <li>
                <a href="users.php" title="users page" style="color: #a270c4">Users</a>
            </li>
            <li>
                <a href="logout.php" title="logout page" style="color: #a270c4">Log out</a>
            </li>';
          }
          else{ echo'
            <li>
                <a href="register.php" title="register">Register</a>
            </li>
            <li>
                <a href="login.php" title="login">Log in</a>
            </li>';}
            ?>

        </ul>
    </nav>

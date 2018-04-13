<!DOCTYPE html>
<html>


<head>
    <title>Save rregister</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <?php
    $username=$_POST['username'];
    $password=$_POST['password'];
    $confirm=$_POST['confirm'];
    $ok=true;
    if(empty($username)){
        echo'username empty';
        $ok=false;
    }
    
    if(empty($password)){
        echo'password empty';
         $ok=false;
    }
    
     if($password !=$confirm){
        echo'password not equal to confirm';
         $ok=false;
    }
    try{
    if($ok){
        $password=password_hash($password,PASSWORD_DEFAULT);
        $conn = new PDO('mysql:host=sql.computerstudi.es;dbname=gc200354737', 'gc200354737', 'SRQWYy5T');
        $sql="INSERT INTO users (username,password) values(:username,:password)";
        $cmd=$conn->prepare($sql);
        $cmd->bindParam(':username',$username, PDO::PARAM_STR,50);
        $cmd->bindParam(':password',$password,PDO::PARAM_STR,250);
        $cmd->execute();
        $conn=null;
        
        
        echo"registraion complete";
    }
    
    }
catch (Exception $e) {
    header('location:error.php');
    mail('gurjeet8177@gmail.com', 'COMP1006 Web App Error', $e);
}
    
    
    ?>
    </body>
</html>
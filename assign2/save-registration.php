<!DOCTYPE html>
<html>


<head>
    <title>Save registeration</title>

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

    $conn = new PDO('mysql:host=sql.computerstudi.es;dbname=gc200354737', 'gc200354737', 'SRQWYy5T');
    $sql = "SELECT username FROM users WHERE username = :username";
    $cmd=$conn->prepare($sql);
    $cmd->bindParam(':username',$username, PDO::PARAM_STR,50);
    $cmd->execute();
    $usernameExist = $cmd->fetchAll();
    if(!empty($usernameExist)){

        echo 'username already exist' ;
        $ok=false;
    }
    if (empty($password) || (strlen($password) < 8)) {
    echo 'Password is invalid<br />';
    $ok = false;}

    
    if(empty($password)){
        echo'password empty';
         $ok=false;
    }
    
     if($password !=$confirm){
        echo'password not equal to confirm';
         $ok=false;
    }
    
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
    
    ?>
    </body>
</html>
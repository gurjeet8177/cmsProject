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
    <nav class="navbar">
        <a href="menu.php" title="comp web application" class="navbar-brand">comp1006 app</a>
        <ul class="nav navbar-nav">
            <?php
          if(!empty($_SESSION['user_id'])) { echo'<li>
                <a href="movies.php" title="movies page">Movies</a>
            </li>
            <li>
                <a href="books.php" title="books page">Books</a>
            </li>
            <li>
                <a href="logout.php" title="logout page">Log out</a>
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

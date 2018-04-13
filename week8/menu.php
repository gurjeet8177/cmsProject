<?php ob_start(); ?>
<?php

// access the current session
require_once('auth.php');


?>

<?php
$page_title=null;
$page_title="Main Menu";
require_once('header.php');
?>

<main class="container">

    <h1>COMP1006 Application</h1>
<ul class="list-group">
 <li  class="list-group-item">   <a href="movies.php" title="Movies">Movies</a></li>
    <li  class="list-group-item">   <a href="books.php" title="books">books</a></li>
</ul>
</main>
<?php
require_once('footer.php');
ob_flush()
?>
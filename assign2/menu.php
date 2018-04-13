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

    <h1>Application Menu</h1>
<ul class="list-group" style="position: absolute; width: 400px; top: 300px; ">
 <li  class="list-group-item"  style="background-color: #000000">   <a href="default.php" title="default" style="color: #a270c4">Default page</a></li>
    <li  class="list-group-item"  style="background-color: #000000" >   <a href="users.php" title="users" style="color: #a270c4">Users list</a></li>
    <li  class="list-group-item"  style="background-color: #000000" >   <a href="upload.php" title="users" style="color: #a270c4">Change Logo</a></li>
</ul>
</main>
<?php
require_once('footer.php');
ob_flush()
?>
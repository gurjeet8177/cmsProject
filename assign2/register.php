<?php
$page_title=null;
$page_title="Register";

require_once('header.php');
?>


   
<div class="container">
    <h1>User Details</h1>
    <form method="post" action="save-registration.php">
        <fieldset class="form-group">
            <label for="title" class="col-sm-2">email</label>
            <input name="username" id="username" required type="email" />
        </fieldset>

        <fieldset class="form-group">
            <label for="password" class="col-sm-2">password</label>
            <input name="password" id="password" type="password" required required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" />
        </fieldset>
        
         <fieldset class="form-group">
            <label for="confirm" class="col-sm-2">confirm password</label>
            <input name="confirm" id="confirm" type="password" required  />
        </fieldset>

        <button type="submit" class="btn btn-success btnRegister">register</button>
    </form>
</div>

<?php
require_once('footer.php');
?>
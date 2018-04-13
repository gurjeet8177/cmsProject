<?php
$page_title=null;
$page_title="Log In";

require_once('header.php');
?>
<div class="container">
    <h1>Log in </h1>
    <form method="post" action="validate.php">
        <fieldset class="form-group">
            <label for="title" class="col-sm-2">username</label>
            <input name="username" id="username" required  />
        </fieldset>

        <fieldset class="form-group">
            <label for="password" class="col-sm-2">password</label>
            <input name="password" id="password" type="password" required  />
        </fieldset>

        <button type="submit" class="col-sm-offset-2 btn btn-success">login</button>
    </form>
</div>

<?php
require_once('footer.php');
?>
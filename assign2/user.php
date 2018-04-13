<?php ob_start(); ?>
<?php

// access the current session
require_once('auth.php');

?>

    <?php
$page_title=null;
$page_title="Add User";

require_once('header.php');
    // check the url for a user_id parameter and store the value in a variable if we find one
    if (empty($_GET['user_id']) == false) {
        $user_id = $_GET['user_id'];

        // connect
        require('db.php');
        // write the sql query
        $sql = "SELECT username FROM users WHERE user_id = :user_id";

        // execute the query and store the results
        $cmd = $conn->prepare($sql);
        $cmd->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $cmd->execute();
        $users = $cmd->fetchAll();

        // populate the fields for the selected user from the query result
        foreach ($users as $user) {
            $username = $user['username'];
           // $author = $user['author'];
            //$year = $user['year'];

        }

        // disconnect
        $conn = null;
    }

    ?>

    <div class="container">
        <h1>Edit User </h1>
        <form method="post" action="save-user.php">
            <fieldset class="form-group">
                <label for="title" class="col-sm-2" >Username:</label>
                <input name="username" id="title" style="border-radius: 5px" required value="<?php echo $username; ?>" />
            </fieldset>
            <fieldset class="form-group">
            <label for="password" class="col-sm-2">password</label>
            <input name="password" id="password" type="password" required  />
        </fieldset>
        
         <fieldset class="form-group">
            <label for="confirm" class="col-sm-2">confirm password</label>
            <input name="confirm" id="confirm" type="password" required  />
        </fieldset>

            <input name="user_id" type="hidden" value="<?php echo $user_id; ?>" />

            <button type="submit" class="col-sm-offset-2 btn btn-success">Submit</button>
        </form>
    </div>

<?php
require_once('footer.php');
?>
<?php ob_flush(); ?>
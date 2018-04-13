<?php ob_start(); ?>
<?php

// access the current session
require_once('auth.php');

?>

<?php
$page_title=null;
$page_title="Add page";

require_once('header.php');


// check the url for a movie_id parameter and store the value in a variable if we find one
if (empty($_GET['page_id']) == false) {
    $page_id = $_GET['page_id'];

    // connect
    $conn= new PDO('mysql:host=sql.computerstudi.es;dbname=gc200354737','gc200354737','SRQWYy5T');

    // write the sql query
    $sql = "SELECT * FROM pages WHERE page_id = 6";

    // execute the query and store the results
    $cmd = $conn->prepare($sql);
    $cmd->bindParam(':page_id', $page_id, PDO::PARAM_INT);
    $cmd->execute();
    $pages = $cmd->fetchAll();

    // populate the fields for the selected movie from the query result
    foreach ($pages as $page) {
        $title= $page['title'];
       $content = $page['content'];


    }

    // disconnect
    $conn = null;
}

?>

<div class="container">
    <h1>Movie Details</h1>
    <form method="post" action="save-page.php">
        <fieldset class="form-group">
            <label for="title" class="col-sm-2">title:</label>
            <input name="title" id="title" required value="<?php echo $title; ?>" />
        </fieldset>


        <fieldset class="form-group">
            <label for="content" class="col-sm-2">Lyrics:</label>
            <input name="content" id="content" required  value="<?php echo $content; ?>" />
        </fieldset>
        <input name="page_id" type="hidden" value="<?php echo $page_id; ?>" />

        <button type="submit" class="col-sm-offset-2 btn btn-success">Submit</button>
    </form>
</div>

</body>

</html>
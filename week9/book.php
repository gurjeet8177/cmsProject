<?php ob_start(); ?>
<?php

// access the current session
require_once('auth.php');

?>

    <?php
$page_title=null;
$page_title="Add book";

require_once('header.php');
    // check the url for a movie_id parameter and store the value in a variable if we find one
    if (empty($_GET['book_id']) == false) {
        $book_id = $_GET['book_id'];

        // connect
        require('db.php');
        try{
        // write the sql query
        $sql = "SELECT * FROM books WHERE book_id = :book_id";

        // execute the query and store the results
        $cmd = $conn->prepare($sql);
        $cmd->bindParam(':book_id', $book_id, PDO::PARAM_INT);
        $cmd->execute();
        $books = $cmd->fetchAll();

        // populate the fields for the selected movie from the query result
        foreach ($books as $book) {
            $title = $book['title'];
            $author = $book['author'];
            $year = $book['year'];

        }

        // disconnect
            
        $conn = null;}
        
        
catch (Exception $e) {
    header('location:error.php');
    mail('gurjeet8177@gmail.com', 'COMP1006 Web App Error', $e);
}
        
        
        
    }

    ?>

    <div class="container">
        <h1>book Details</h1>
        <form method="post" action="save-book.php">
            <fieldset class="form-group">
                <label for="title" class="col-sm-2">Title:</label>
                <input name="title" id="title" required value="<?php echo $title; ?>" />
            </fieldset>
            <fieldset class="form-group">
                <label for="year" class="col-sm-2">Year:</label>
                <input name="year" id="year" required type="number" value="<?php echo $year; ?>" />
            </fieldset>
            <fieldset class="form-group">
                <label for="length" class="col-sm-2">Author</label>
                <input name="author" id="author" required type="text" value="<?php echo $author; ?>" />
            </fieldset>

            <input name="book_id" type="hidden" value="<?php echo $book_id; ?>" />

            <button type="submit" class="col-sm-offset-2 btn btn-success">Submit</button>
        </form>
    </div>

<?php
require_once('footer.php');
?>
<?php ob_flush(); ?>
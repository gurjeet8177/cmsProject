<?php ob_start(); ?>
<?php

// access the current session
session_start();

// check if there is a user identity stored in the session object
if (empty($_SESSION['user_id'])) {
// if there is no user_id in the session, redirect the user to the login page
    header('location:login.php');
    exit();
}

?>
    <!DOCTYPE html>
    <html>


    <head>
        <title>user input</title>

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/bootstrap-theme.min.css">

        <!-- Latest compiled and minified JavaScript -->
        <script src="js/bootstrap.min.js"></script>
    </head>

    <body>
    <?php

    // check the url for a movie_id parameter and store the value in a variable if we find one
    if (empty($_GET['book_id']) == false) {
        $book_id = $_GET['book_id'];

        // connect
        $conn= new PDO('mysql:host=sql.computerstudi.es;dbname=gc200354737','gc200354737','SRQWYy5T');

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
        $conn = null;
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

    </body>

    </html>
<?php ob_flush(); ?>
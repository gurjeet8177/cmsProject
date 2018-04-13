<?php ob_start(); ?>

    <?php
$page_title=null;
$page_title="edit hotel";

require_once('header.php');
    // check the url for a movie_id parameter and store the value in a variable if we find one

    $hotel_id = $_GET['hotel_id'];

    // connect
    require('db.php');
    // write the sql query
    $sql = "SELECT * FROM hotels WHERE hotelId = :hotel_id";
    
    // execute the query and store the results
    $cmd = $conn->prepare($sql);
    $cmd->bindParam(':hotel_id', $hotel_id, PDO::PARAM_INT);
    $cmd->execute();
    $movies = $cmd->fetchAll();
    
    // populate the fields for the selected movie from the query result
    foreach ($movies as $movie) {
        $name = $movie['name'];
        $address= $movie['address'];
        $rating = $movie['rating'];
        $photo = $movie['photo'];
    }
    
    // disconnect
    $conn = null;

    
    ?>
    
    <div class="container">
        <h1>hotel details</h1>
        <form method="post" action="update.php">
            <fieldset class="form-group">
                <label for="title" class="col-sm-2">Name:</label>
                <input name="name" id="title" required value="<?php echo $name; ?>" />
            </fieldset>
             <fieldset class="form-group">
                <label for="year" class="col-sm-2">address:</label>
                <input name="address" id="year" required  value="<?php echo $address; ?>" />
            </fieldset>
             <fieldset class="form-group">
                <label for="length" class="col-sm-2">rating:</label>
                <input name="rating" id="length" required type="number" value="<?php echo $rating; ?>" />
            </fieldset>
             <fieldset class="form-group">
                <label for="url" class="col-sm-2">photo:</label>
                <input name="photo" id="url" required  value="<?php echo $photo; ?>" />
            </fieldset>
             <input name="hotel_id" type="hidden" value="<?php echo $hotel_id; ?>" />

            <button type="submit" class="col-sm-offset-2 btn btn-success">Submit</button>
        </form>
    </div>

<?php
require_once('footer.php');
?>
<?php ob_flush(); ?>
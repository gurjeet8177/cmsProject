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
    <div class="container">
        <h1>Movie Details</h1>
        <form method="post" action="save-movie.php">
            <fieldset class="form-group">
                <label for="title" class="col-sm-2">Title:</label>
                <input name="title" id="title" required />
            </fieldset>
             <fieldset class="form-group">
                <label for="year" class="col-sm-2">Year:</label>
                <input name="year" id="year" required type="number" />
            </fieldset>
             <fieldset class="form-group">
                <label for="length" class="col-sm-2">Length:</label>
                <input name="length" id="length" required type="number" />
            </fieldset>
             <fieldset class="form-group">
                <label for="url" class="col-sm-2">URL:</label>
                <input name="url" id="url" required type="url" />
            </fieldset>
            <button type="submit" class="col-sm-offset-2 btn btn-success">Submit</button>
        </form>
    </div>

</body>

    </html>
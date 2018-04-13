<!DOCTYPE html>
<html>


<head>
    <title>login</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</head>

<body>

<div class="container">
    <h1>Movie Details</h1>
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

</body>

</html>
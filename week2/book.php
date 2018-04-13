<!DOCTYPE html>
<html>


    <head>
        <title>user input</title>
</head>
    
<body>
    <form method="post" action="save-book.php">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" />
        
         <label for="year">year</label>
        <select name="year" id="year" >
        <option value="2001">2001</option>
            <option value="2002">2002</option>
            <option value="2003">2003</option>
        </select>
        
         
        
         <label for="author">author</label>
        <input type="text" name="author" id="author" />
        <button>Submit</button>
    
    </form>
</body>

    </html>
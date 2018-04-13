<!DOCTYPE html>
<html>


    <head>
        <title>Register</title>

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="/css/bootstrap-theme.min.css">
<script src="js/bootstrap.min.js"></script>
</head>

<body>


    <div class="container" style="position:absolute;background-color:grey;top:30%; width:100%">
        <h2>Register For Ontario Campaign</h2>
        <form action="save-data.php" method="post" >
            <fieldset class="form-group">
                <label for="fname" class="col-sm-2">First Name:</label>
                <input type="text" name="fname" id="fname" required />
                  </fieldset>
                  <fieldset class="form-group">
                <label for="lname" class="col-sm-2">Last Name:</label>
                <input type="text" name="lname" id="lname" required />
            </fieldset>
             
             <fieldset class="form-group">
                 <label for="address"  class="col-sm-2" >Address</label>
                 <input type="text" name="address" id="address" required />
                  </fieldset>
            
            <fieldset class="form-group">
                 <label for="email"  class="col-sm-2" >Email</label>
                 <input type="text" name="email" id="email" required />
                  </fieldset>

                 <fieldset class="form-group">
                      <label for="address"  class="col-sm-2" >City</label>
                    <select name="city" required class="col-sm-2" id="city">
                      
                     
                  <?php
                  //storing the connection connect var
                  $connect= new PDO('mysql:host=sql.computerstudi.es;dbname=gc200354737','gc200354737','SRQWYy5T');
                 
                        //checking if connection is made or not
                        if(!$connect){
                      echo 'there is problem connecting';
                  }
                  else{
                   
                  
                  $sqlStatement="SELECT city FROM ontario_cities ";
                      //storing sql query in variable above to execute it further
                  $cmd=$connect->prepare($sqlStatement);
                  $cmd->execute();
                  $cities=$cmd->fetchAll();
                 
                      foreach($cities as $currentCities){

                  echo "<option>";   echo $currentCities['city'].'</option>';
                      //creates <option> for every loop
                          

                  }//loop ends here
                  /////
                      
                    
        
        
    }
    //end data connection
    $conn=null;
    

                  ?>
                  
                      </select>
                       </fieldset>
                      
                <fieldset class="form-group">
                <label for="date_of_birth" class="col-sm-2">Date of Birth:</label>
                <input name="date_of_birth" id="date_of_birth" type="date" required type="date" />
                
            
            </fieldset>
            <button type="submit"  style="padding:10px;">Submit</button>
        

        </form>
    </div>


</body>

    </html>

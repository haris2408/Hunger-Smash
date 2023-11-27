<!DOCTYPE html>
<html lang="en">
<head>
<link type="text/css" rel="stylesheet" href="style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
    .button {
  background-color: #864000;
  border: none;
  color: #ddd;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  color: white;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 16px;
}

.button:hover {
  background-color:#D44000;
}
  </style>
</head>
<body style="background-color:black;">
<div class="header">
    
    <a href="index.php">
        <img src="images/logoo.png" alt="" width="100" height="100" >
      </a> 
</div>
<div class="container">
  <h2 style="color:white;">Add new dish</h2>
  <form action="" method="POST">

    <div class="form-group">
      <label style="color:white;">Dish Id</label>
      <input type="text" class="form-control" id="did" placeholder="Enter DishID (XXX00)" name="did">
    </div>

    <div class="form-group">
      <label style="color:white;">Dish Name:</label>
      <input type="text" class="form-control" id="dnme" placeholder="Enter Dish Name" name="dnme">
    </div>


    <div class="form-group">
      <label style="color:white;">Price:</label>
      <input type="number" class="form-control" id="prce" placeholder="Enter Price" name="prce">
    </div>

    <p style="color:white;">category<br>
    <select name="ctgry">
    <option value="">[Choose Option Below]</option>
    <option value="Burgers">Burgers</option>
    <option value="Sandwiches">Sandwiches</option>
    <option value="Wraps">Wraps</option>
    <option value="Fried Chicken">Fried Chicken</option>
    <option value="Fries">Fries</option>
    <option value="Add Ons">Add Ons</option>
</select><br>
</div>
    <input type="submit" class="button" name="addubtn"></button>
   
  </form>
  <?php
        if(isset($_POST['addubtn']))
        {
            $dishid=$_POST['did'];
            $dname=$_POST['dnme'];
            $dprice=$_POST['prce'];
            $ct=$_POST['ctgry'];
            $conn = mysqli_connect ('localhost','root','','rsm');
            if(!$conn)
            {
              echo '<span style="color:#AFA;text-align:center;">not connected</span>';
            }  
            $q ="insert into dishes(Dish_id,category,D_name,price) values('$dishid','$ct','$dname',$dprice)";
            $run = mysqli_query($conn,$q);
            
            if($run)
            {
                echo '<span style="color:#AFA;text-align:center;">Dish Added!!!!!!!</span>';
            }
            else
            {
                echo '<span style="color:red;text-align:center;">not added!!!!!</span>';
                printf("error: %s\n", mysqli_error($conn));
                
            }

        }
      
    ?>
</div>

</body>
</html>

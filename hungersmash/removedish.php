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
  color: white;
  display: inline-block;
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
  <h2 style="color:white;">Remove Dish</h2>
  <form action="" method="POST">

    <div class="form-group">
      <label style="color:white;">Dish Id</label>
      <input type="text" class="form-control" id="did" placeholder="Enter DishID (XXX00)" name="did">
    </div>

</div>
    <input type="submit" class="button" name="addubtn" value="Remove"></button>
   
  </form>
  <?php
        if(isset($_POST['addubtn']))
        {
            
           
            $conn = mysqli_connect ('localhost','root','','rsm');
            if(!$conn)
            {
              echo "not connected";
            }  
            $Did=$_POST['did'];
            $select = "select * from dishes where Dish_id='$Did'";
            $run = mysqli_query($conn,$select);
            $creds=mysqli_fetch_array($run);
            $db_did =$creds['Dish_id'];
            if($Did==$db_did )
            {
                $q ="DELETE FROM dishes WHERE Dish_id='$Did'";
                $run = mysqli_query($conn,$q);
                
                if($run)
                {
                    echo '<span style="color: white ;text-align:center;">Dish Removed!!!!!!!</span>';
                }
                else
                {
                    echo '<span style="color: white ;text-align:center;">not Removed!!!!!</span>';
                    printf("error: %s\n", mysqli_error($conn));
                    
                }
            }
            else
            {
                echo '<span style="color: white ;text-align:center;">No such dish found. Try again</span>';
            }

        }
      
    ?>
    <br><br>;
    <button onclick="window.open('http://localhost/hungersmash/displaymenu.php','_blank')" class="button">Show Menu</button>
</div>

</body>
</html>

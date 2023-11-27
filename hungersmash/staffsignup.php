<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>Bootstrap Example</title>
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
<br><br>
<div class="container">
  <h2 style="color:black;">Add new user</h2>
  <form action="" method="POST">

      <div class="form-group">
      <label style="color:white;">Start Time:</label>
      <input type="text" class="form-control" id="strt" placeholder="Start Time (hh:min)" name="strt">
      </div>

      <div class="form-group">
      <label style="color:white;">End Time:</label>
      <input type="text" class="form-control" id="end" placeholder="End Time (hh:min)" name="end">
      </div>

      <div class="form-group">
      <label style="color:white;">Salary:</label>
      <input type="integer" class="form-control" id="sal" placeholder="Salary" name="sal">
      </div>

</div>
    <input type="submit" class="button" name="addubtn"></button>
    <?php
        $conn = mysqli_connect ('localhost','root','','rsm');
        if(isset($_POST['addubtn']))
        {
            $strttme=$_POST['strt'];
            $endtime=$_POST['end'];
            $salry=$_POST['sal'];
            $Duname=$_SESSION['ty'];
          
            $q="INSERT INTO basicstaff(Bname,shifthrs_start,shifthrs_end,salary) VALUES('$Duname','$strttme','$endtime',$salry)";
            $run=mysqli_query($conn,$q);
            if($run==true)
            {
              echo "<script>window.open('gotologinpage.php','_self')</script>";
            }
            else
            {
              echo "nono";
            }

        }
    ?>
  </form>
</div>

</body>
</html>


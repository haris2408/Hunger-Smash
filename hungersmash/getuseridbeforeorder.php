<?php session_start();
            $conn=mysqli_connect('localhost','root','','rsm');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  
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
  <h2 style="color:white;">Get User ID</h2>
  <?php
    $T=$_SESSION['type'];
    if($T=="Customer")
    {
        $uname=$_SESSION['lgin'];
        $select = "select * from customers where Cname='$uname'";
            $run = mysqli_query($conn,$select);
            $creds=mysqli_fetch_array($run);
            $db_uname =$creds['Cname'];
            $pen="pending";
            if($uname==$db_uname)
            {
                $insrt="INSERT INTO orderrecord(Cust_id,cur_status,dateop,timeop) VALUES('$uname','$pen',CURDATE(),CURTIME())";
                $insertq=mysqli_query($conn,$insrt);
                if($insertq == true)
                {
                    echo'<span style="color: white ;text-align:center;">added</span>';
                    $getorderid="SELECT order_num FROM orderrecord ORDER BY order_num DESC LIMIT 1";
                    $getorderidq=mysqli_query($conn,$getorderid);
                    $ordn=mysqli_fetch_array($getorderidq);
                    $ordrn=$ordn['order_num'];
                    $_SESSION['currorder']=$ordrn;
                    echo "<script>window.open('ordertaking.php','_self')</script>";
                }
                else{
                    echo'<span style="color: white ;text-align:center;"> not added</span>';
                }
            }
            else{
                echo '<span style="color: white ;text-align:center;">No such customer found 1</span>';
            }
    }
  ?>
  <form action="" method="POST">

    <div class="form-group">
      <label style="color:white;">Username:</label>
      <input type="text" class="form-control" id="uname" placeholder="Customer's username" name="uname">
    </div>

    
</div>
    <input type="submit" class="button" name="ghgh"></button>
   <?php
        if(isset($_POST['ghgh']))
        {
            $uname=$_POST['uname'];
            $select = "select * from customers where Cname='$uname'";
	        $run = mysqli_query($conn,$select);
	        $creds=mysqli_fetch_array($run);
            $db_uname =$creds['Cname'];
            $pen="pending";
            if($uname==$db_uname)
            {
                $insrt="INSERT INTO orderrecord(Cust_id,cur_status,dateop,timeop) VALUES('$uname','$pen',CURDATE(),CURTIME())";
                $insertq=mysqli_query($conn,$insrt);
                if($insertq == true)
                {
                    echo"added";
                    $getorderid="SELECT order_num FROM orderrecord ORDER BY order_num DESC LIMIT 1";
                    $getorderidq=mysqli_query($conn,$getorderid);
                    $ordn=mysqli_fetch_array($getorderidq);
                    $ordrn=$ordn['order_num'];
                    $_SESSION['currorder']=$ordrn;
                    echo "<script>window.open('ordertaking.php','_self')</script>";
                }
                else{
                    echo'<span style="color: white ;text-align:center;"> not added</span>';
                }
            }
            else{
                echo '<span style="color: white ;text-align:center;">No such customer found</span>';
            }

        }
   ?>
    
  </form>
  <br><br>&emsp;&emsp;&emsp;&emsp;

  <button class="button" onclick="window.open('http://localhost/hungersmash/searchcustomer.php','_blank')"> SEARCH CUSTOMER</button>
</div>

</body>
</html>

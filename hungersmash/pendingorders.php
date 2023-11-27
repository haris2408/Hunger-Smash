<?php 
    session_start();
    $conn=mysqli_connect("localhost","root","","rsm");
    if($conn->connect_error)
    {
        die("connection failed". $conn->connect_error);
    }


?>
<!DOCTYPE html>
<html>
<head>
<link type="text/css" rel="stylesheet" href="style.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
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
      <h1 style="color:white;">Pending Orders</h1>    
 
</div>

<form action="" method="post">
<input type="text" name="oid" placeholder="order#"><br>
<input type="submit" class="button" value="Change Status" name="btn" >
</form>
<?php
    if(isset($_POST['btn']))
    {
        $ordrno=$_POST['oid'];
        $pen="pending";
        $q="select order_num from orderrecord where order_num='$ordrno' and cur_status='$pen'";
        $result=mysqli_query($conn,$q);
        $ans=$result->fetch_assoc();
        $anss=$ans["order_num"];
        if($ordrno==$anss)
        {
            $com="complete";
            $q="update orderrecord set cur_status='$com' where order_num='$ordrno'";
            $result1=mysqli_query($conn,$q);
            if($result1==true)
            {
                echo'<span style="color: white ;text-align:center;">Order Completed</span>';
            }
        }
        else{
            echo '<span style="color: white ;text-align:center;">No Such Pending orders</span>';
        }
    }
?>
<br><br>
<button onclick="window.open('http://localhost/hungersmash/printpendingoreder.php','_blank')" class="button">Show orders to be served</button>

</body>
</html>

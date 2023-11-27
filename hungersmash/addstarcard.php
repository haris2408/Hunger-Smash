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
      <h1 style="color:white;">Add Star Card</h1>    
 
</div>
<div class="container">
  <form action="" method="POST">

    <div class="form-group">
      <label >Card Num</label>
      <input type="number" class="form-control" id="did" placeholder="Enter 3 digit number" name="did">
    </div>
</div>
    <input type="submit" class="button" name="addubtn"></button>
    <?php
        if(isset($_POST['addubtn']))
        {
            $conn=mysqli_connect("localhost","root","","rsm");
            if($conn->connect_error)
            {
                die("connection failed". $conn->connect_error);
            }
            $dig=$_POST['did'];
            $q="insert into starcard(Scard_num,credit,assigned) values ('$dig',0,false)";
            $res=mysqli_query($conn,$q);
            if($res=true)
            {
                echo '<span style="color:white;text-align:center;"> Card Added</span>';
            }
            else{
                echo '<span style="color:white;text-align:center;"> Card Not Added</span>';
            }
        }
    ?>
  </form>
   


</body>
</html>

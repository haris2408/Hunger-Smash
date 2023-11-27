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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
  .card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}
.button {
  background-color: #864000;
  border: none;
  color: #ddd;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  color:white;
  display: inline-block;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 16px;
}

.button:hover {
  background-color:#D44000;
}
.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  margin-top: 10px;
  width: 50%;
}
</style>
</head>
<body style="background-color:black;">
<div class="header">
    
    <a href="index.php">
        <img src="images/logoo.png" alt="" width="100" height="100" >
      </a>
      <h1 style="color:white;">Manager Menu</h1>    
 
</div>
<div class="row">
    <div class="col">
        <div class="leftside">
        <br><br>&emsp;&emsp;&emsp;&emsp;
        <button onclick="window.open('http://localhost/hungersmash/displaymenu.php','_blank')" class="button">Show Menu</button>
        &emsp;&emsp;
        <button onclick="window.open('http://localhost/hungersmash/adddish.php','_self')" class="button">ADD DISH</button>
        &emsp;&emsp;
        <button onclick="window.open('http://localhost/hungersmash/removedish.php','_self')" class="button">REMOVE DISH</button>
        <br><br>&emsp;&emsp;&emsp;&emsp;
        <button class="button" onclick="window.open('http://localhost/hungersmash/getuseridbeforeorder.php','_self')">ORDER TAKING</button>
        &emsp;&emsp;
        <button class="button" onclick="window.open('http://localhost/hungersmash/pendingorders.php','_blank')" >DISPLAY PENDING ORDERS</button>
        <br><br>&emsp;&emsp;&emsp;&emsp;
        <button class="button" onclick="window.open('http://localhost/hungersmash/addstarcard.php','_self')">ADD STAR CARD</button>
        <br><br>&emsp;&emsp;&emsp;&emsp;
        <button class="button" onclick="window.open('http://localhost/hungersmash/searchuser.php','_self')">SEARCH USER</button>
        <br><br>&emsp;&emsp;&emsp;&emsp;
        <button onclick="window.open('http://localhost/hungersmash/logout.php','_self')" class="button">LOG OUT</button>


        </div>    
    </div>    

    <div class="col">
        <div class="rightside">
        <!-- <h2 style="text-align:center">User Profile Card</h2> -->
        
        <div class="card">
          <img src="images/a.jpg" alt="John" style="width:50% " class="center">
          <?php
            $Unamee=$_SESSION['lgin'];
            $q="select * from users where Uname='$Unamee'";
            $result=mysqli_query($conn,$q);
              $ans=$result->fetch_assoc();
              $til="title";
              echo "<h1>".$ans['FullName']."</h1>";
              echo "<p class='$til'>".$ans['Uname']."</p>";
              echo "<p class='$til'>".$ans['Utype']."</p>";
              echo "<p>".$ans['email']."</p>";
              echo "<p>".$ans['telnum']."</p>";
              echo "<p>".$ans['address']."</p>";
          ?>
        <button onclick="window.open('http://localhost/hungersmash/editinfo.php','_self')" class="button">Edit Info</button> 

        </div>
      </div>    
        
    </div>    
</div>

</body>
</html>

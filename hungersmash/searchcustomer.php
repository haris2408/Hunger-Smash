<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link type="text/css" rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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

table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 60%;
  border: 10px solid #373737;
  margin-left: 250px;
}

th, td {
  text-align: left;
  color: #000;
  padding: 10px;
  border: 1px solid black;
}

tr:nth-child(even) {
  background-color: white;
}
tr:nth-child(odd) {
  background-color: white;
}
input[type=text] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  margin-left: 20px;
  box-sizing: border-box;
}

</style>
</head>
<body style="background-color:black;">

<div class="header">
    
    <a href="index.php">
        <img src="images/logoo.png" alt="" width="100" height="100" >
      </a>
      <h1 style="color:white;">Search Customer</h1>    
 
</div>
<?php $conn = mysqli_connect ('localhost','root','','rsm'); 
    $ordrid=$_SESSION['currorder'];
?>
<div class="row">
    <div class="col">
        <div class="leftside">
        <br><br>
        <form action="" method="post">
        <input type="text" name="usr" placeholder="UserName or Name or Type"><br>
        <input type="submit" class="button" value="Search" name="btn" >
        </form>
        
        
        <br><br>
        </div>    
    </div>    

    <div class="col">
        <div class="rightside">
        

            <br><br>
            <table>
            <tr>
                <th>User Name</th>
                <th>Full Name</th>
                <th>User Type</th>
                <th>Address</th>
                <th>Email</th>
                <th>Contact#</th>
            </tr>

            <?php
                 if(isset($_POST['btn']))
                 {
                     $usr=$_POST['usr'];
                     $conn=mysqli_connect("localhost","root","","rsm");
                     if($conn->connect_error)
                     {
                         die("connection failed". $conn->connect_error);
                     }
                     $cus="Customer";
                     $q="SELECT * from users where (Uname like'%{$usr}%' or FullName like'%$usr%') and (Utype like'%$cus%')";
                     $result = mysqli_query($conn,$q);
     
                     if ($result->num_rows > 0) {
                         // output data of each row
                         while($row = $result->fetch_assoc()) {
                             echo "<tr><td>". $row["Uname"]. "</td><td>". $row["FullName"]. "</td><td>" . $row["Utype"] . "</td><td>". $row["address"]."</td><td>" . $row["email"]."</td><td>" .$row["telnum"] . "</td></tr>";
                             
                         }
                         echo "</table>";
                     } else {
                         echo '<span style="color: white ;text-align:center;">no customer found</span>';
                     }
                     $conn->close();
                     
                 
                 }
               

            ?>
            </table>

        </div>    
        
    </div>    
</div>
</body>
</html>

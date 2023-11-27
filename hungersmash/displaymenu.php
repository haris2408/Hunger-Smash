<!DOCTYPE html>
<html>
<head>
<link type="text/css" rel="stylesheet" href="style.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
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
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}
tr:nth-child(odd) {
  background-color: grey;
}
</style>
</head>
<body style="background-color:black;">
<div class="header">
    
    <a href="index.php">
        <img src="images/logoo.png" alt="" width="100" height="100" >
      </a>
    
 
</div>
<h1  style="text-align:center;" style="font-size:300%;"><b style="color:white;">MENU</b></h1>
<h2  style="margin-left: 250px" style="font-size:300%;"><b style="color:white;">BURGERS</b></h2>

<table>
  <tr>
    <th>Dish ID</th>
    <th>Dish Name</th>
    <th>Price</th>
  </tr>

  <?php
    $conn=mysqli_connect("localhost","root","","rsm");
    if($conn->connect_error)
    {
        die("connection failed". $conn->connect_error);
    }
 
    $q="select Dish_id, D_name, price from dishes where category = 'Burgers'";
    $result = mysqli_query($conn,$q);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>". $row["Dish_id"]. "</td><td>". $row["D_name"]. "</td><td>" . $row["price"] . "</td></tr>";
            
        }
        echo "</table>";
    } else {
        echo '<span style="color:#AFA;text-align:center;">0 results</span>';
    }
    $conn->close();

  ?>
</table>

<br><br>

<h2 style="margin-left: 250px" style="font-size:300%;"><b style="color:white;" >SANDWICHES</b></h2>

<table>
  <tr>
    <th>Dish ID</th>
    <th>Dish Name</th>
    <th>Price</th>
  </tr>

  <?php
    $conn=mysqli_connect("localhost","root","","rsm");
    if($conn->connect_error)
    {
        die("connection failed". $conn->connect_error);
    }
 
    $q="select Dish_id, D_name, price from dishes where category = 'Sandwiches'";
    $result = mysqli_query($conn,$q);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>". $row["Dish_id"]. "</td><td>". $row["D_name"]. "</td><td>" . $row["price"] . "</td></tr>";
            
        }
        echo "</table>";
    } else {
      echo '<span style="color:#AFA;text-align:center;">0 results</span>';
    }
    $conn->close();

  ?>
</table>

<br><br>

<h2  style="margin-left: 250px" style="font-size:300%;"><b style="color:white;">WRAPS</b></h2>

<table>
  <tr>
    <th>Dish ID</th>
    <th>Dish Name</th>
    <th>Price</th>
  </tr>

  <?php
    $conn=mysqli_connect("localhost","root","","rsm");
    if($conn->connect_error)
    {
        die("connection failed". $conn->connect_error);
    }
 
    $q="select Dish_id, D_name, price from dishes where category = 'Wraps'";
    $result = mysqli_query($conn,$q);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>". $row["Dish_id"]. "</td><td>". $row["D_name"]. "</td><td>" . $row["price"] . "</td></tr>";
            
        }
        echo "</table>";
    } else {
      echo '<span style="color:#AFA;text-align:center;">0 results</span>';
    }
    $conn->close();

  ?>
</table>

<br><br>

<h2  style="margin-left: 250px" style="font-size:300%;"><b style="color:white;">FRIED CHICKEN</b></h2>

<table>
  <tr>
    <th>Dish ID</th>
    <th>Dish Name</th>
    <th>Price</th>
  </tr>

  <?php
    $conn=mysqli_connect("localhost","root","","rsm");
    if($conn->connect_error)
    {
        die("connection failed". $conn->connect_error);
    }
 
    $q="select Dish_id, D_name, price from dishes where category = 'Fried Chicken'";
    $result = mysqli_query($conn,$q);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>". $row["Dish_id"]. "</td><td>". $row["D_name"]. "</td><td>" . $row["price"] . "</td></tr>";
            
        }
        echo "</table>";
    } else {
      echo '<span style="color:#AFA;text-align:center;">0 results</span>';
    }
    $conn->close();

  ?>
</table>

<br><br>

<h2  style="margin-left: 250px" style="font-size:300%;"><b style="color:white;">FRIES</b></h2>

<table>
  <tr>
    <th>Dish ID</th>
    <th>Dish Name</th>
    <th>Price</th>
  </tr>

  <?php
    $conn=mysqli_connect("localhost","root","","rsm");
    if($conn->connect_error)
    {
        die("connection failed". $conn->connect_error);
    }
 
    $q="select Dish_id, D_name, price from dishes where category = 'Fries'";
    $result = mysqli_query($conn,$q);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>". $row["Dish_id"]. "</td><td>". $row["D_name"]. "</td><td>" . $row["price"] . "</td></tr>";
            
        }
        echo "</table>";
    } else {
      echo '<span style="color:#AFA;text-align:center;">0 results</span>';
    }
    $conn->close();

  ?>
</table>

<br><br>

<h2  style="margin-left: 250px" style="font-size:300%;"><b style="color:white;">ADD ONs</b></h2>

<table>
  <tr>
    <th>Dish ID</th>
    <th>Dish Name</th>
    <th>Price</th>
  </tr>

  <?php
    $conn=mysqli_connect("localhost","root","","rsm");
    if($conn->connect_error)
    {
        die("connection failed". $conn->connect_error);
    }
 
    $q="select Dish_id, D_name, price from dishes where category = 'Add Ons'";
    $result = mysqli_query($conn,$q);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>". $row["Dish_id"]. "</td><td>". $row["D_name"]. "</td><td>" . $row["price"] . "</td></tr>";
            
        }
        echo "</table>";
    } else {
      echo '<span style="color:#AFA;text-align:center;">0 results</span>';
    }
    $conn->close();

  ?>
</table>

<br><br>

<h2  style="margin-left: 250px" style="font-size:300%;"><b style="color:white;">TEST END</b></h2>

<table>
  <tr>
    <th>Dish ID</th>
    <th>Dish Name</th>
    <th>Price</th>
  </tr>

  <?php
    $conn=mysqli_connect("localhost","root","","rsm");
    if($conn->connect_error)
    {
        die("connection failed". $conn->connect_error);
    }
 
    $q="select Dish_id, D_name, price from dishes where category = 'test'";
    $result = mysqli_query($conn,$q);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>". $row["Dish_id"]. "</td><td>". $row["D_name"]. "</td><td>" . $row["price"] . "</td></tr>";
            
        }
        echo "</table>";
    } else {
      echo '<span style="color:#AFA;text-align:center;">0 results</span>';
    }
    $conn->close();

  ?>
</table>
</body>
</html>

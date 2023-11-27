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
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 60%;
  border: 10px solid #000;
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
</style>
</head>
<body >
<div class="header">
    
    <a href="index.php">
        <img src="images/logoo.png" alt="" width="100" height="100" >
      </a>
    
 
</div>

<h1 style="text-align:center;" style="font-size:300%;"><b>Pending Orders</b></h1>
<?php
    $pen="pending";
    $q="SELECT order_num, dateop, timeop,cur_status from orderrecord where cur_status='$pen' ORDER by order_num";
    $result = mysqli_query($conn,$q);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<br><br>";
            echo "ORDER#: ". $row["order_num"]. " DATE PLACED: ". $row["dateop"]. " TIME PLACED: " . $row["timeop"] . " ORDER STATUS: ".$row["cur_status"];
            $ordrnum=$row["order_num"];

            echo "<table><tr><th>Dish ID</th><th>Dish Name</th><th>Quantity</th></tr>";
               
            $q="select dish_id, quantity from listofitems where order_num = '$ordrnum'";
            $result1 = mysqli_query($conn,$q);

            if ($result1->num_rows > 0) {
                // output data of each row
               
                while($row = $result1->fetch_assoc()) {
                    $DID=$row["dish_id"];
                    $q="select D_name from dishes where Dish_id = '$DID'";
                    $result2 = mysqli_query($conn,$q);
                    $row1 = $result2->fetch_assoc();
                    echo "<tr><td>". $row["dish_id"]."</td><td>". $row1["D_name"]. "</td><td>". $row["quantity"]. "</td></tr>";
                    
                }
                echo "</table>";
            } else {
                echo "0 results 1";
                printf("error: %s\n", mysqli_error($conn));
            }
            

        

            echo"<br><br>";
                    
        }        
    }
    else{
        echo "NO PENDING ORDER";
    }           

?>



</body>
</html>
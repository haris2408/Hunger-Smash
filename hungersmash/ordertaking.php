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
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}
tr:nth-child(odd) {
  background-color: grey;
}
.leftside{
    margin-left: 20px;
}
.rightside{
    text-align: center;
}

/* radiio buttons */
.container {
  display: block;
  position: relative;
  padding-left: 330px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 15px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default radio button */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

/* Create a custom radio button */
.checkmark {
  position: absolute;
  top: 0;
  left: 300px;
  height: 25px;
  width: 25px;
  background-color: #eee;
  border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the indicator (dot/circle) when checked */
.container input:checked ~ .checkmark:after {
  display: block;
  
}

/* Style the indicator (dot/circle) */
.container .checkmark:after {
 	top: 9px;
	left: 9px;
	width: 8px;
	height: 8px;
	border-radius: 50%;
	background: white;
}
</style>
</head>
<body style="background-color:black;">

<div class="header">
    
    <a href="index.php">
        <img src="images/logoo.png" alt="" width="100" height="100" >
      </a>
      <h1 style="color:white;">Let's take the order</h1>    
 
</div>
<?php $conn = mysqli_connect ('localhost','root','','rsm'); 
    $ordrid=$_SESSION['currorder'];
?>
<div class="row">
    <div class="col">
        <div class="leftside">
        <h2 style="color:white;">ORDER# <?php echo "$ordrid"?></h2>
        <form action="" method="post">
        <input type="text" name="did" placeholder="Dish ID (XXX00)"><br>
        <input type="submit" class="button" value="ADD DISH" name="btn" >
        </form>
        <?php
                if(isset($_POST['btn']))
                {
                    $Did=$_POST['did'];
                    $select = "select * from dishes where Dish_id='$Did'";
                    $run = mysqli_query($conn,$select);
                    $creds=mysqli_fetch_array($run);
                    $db_did =$creds['Dish_id'];
                    if($Did==$db_did )
                    {
                        $select = "select * from listofitems where order_num='$ordrid' and dish_id='$Did'";
                        $run = mysqli_query($conn,$select);
                        $creds=mysqli_fetch_array($run);
                        $db_did =$creds['dish_id'];
                        if($db_did != null)
                        {
                            $addtotalq = "UPDATE listofitems
                             SET quantity = quantity+1
                             WHERE order_num = '$ordrid 'and dish_id='$Did'";
                             $run = mysqli_query($conn,$addtotalq); 
                        }
                        else{
                            $select = "insert into listofitems(order_num,dish_id,quantity,price) VALUES('$ordrid','$Did',1,(SELECT price from dishes WHERE Dish_id='$Did'))";
                            $run = mysqli_query($conn,$select); 
                        }
                        
                        $totalq = "SELECT sum(price * quantity) AS value_sum FROM listofitems where order_num='$ordrid'";
                        
                        $runtotalq = mysqli_query($conn,$totalq);
                        $row = mysqli_fetch_array($runtotalq); 
                        $sum = $row['value_sum'];
                        
                        $addtotalq = "UPDATE orderrecord
                        SET total = '$sum'
                        WHERE order_num = '$ordrid'";
                        $runaddtotalq = mysqli_query($conn,$addtotalq);    
                        echo '<span style="color: white ;text-align:center;">dish added</span>';
                    }
                    else
                    {
                        echo '<span style="color: white ;text-align:center;">No such dish found. Try again</span>';
                    }
                }
        ?>
        
        <br><br>
        <form action="" method="post">
        <input type="text" name="rdid" placeholder="Dish ID (XXX00)"><br>
        <input type="submit" class="button" value="REMOVE DISH" name="rbtn" >
        </form>
        <?php
                if(isset($_POST['rbtn']))
                {
                    $Did=$_POST['rdid'];
                    $select = "select * from listofitems where order_num='$ordrid' and dish_id='$Did'";
                    $run = mysqli_query($conn,$select);
                    $creds=mysqli_fetch_array($run);
                    $db_did =$creds['dish_id'];
                    if($Did==$db_did )
                    {
                        $select = "DELETE FROM listofitems WHERE order_num='$ordrid' and dish_id='$Did'";
                        $run = mysqli_query($conn,$select);
                        $totalq = "SELECT sum(price * quantity) AS value_sum FROM listofitems where order_num='$ordrid'";
                        
                        $runtotalq = mysqli_query($conn,$totalq);
                        $row = mysqli_fetch_array($runtotalq); 
                        $sum = $row['value_sum'];
                        
                        $addtotalq = "UPDATE orderrecord
                        SET total = '$sum'
                        WHERE order_num = '$ordrid'";
                        $runaddtotalq = mysqli_query($conn,$addtotalq);    
                        echo '<span style="color: white ;text-align:center;">dish removed</span>';
                    }
                    else
                    {
                        echo '<span style="color: white ;text-align:center;">No such dish found. Try again</span>';
                    }
                }
        ?>
        

        <br><br>
        <button onclick="window.open('http://localhost/hungersmash/displaymenu.php','_blank')" class="button">Show Menu</button>
        <br><br>
        <button onclick="window.open('http://localhost/hungersmash/endorder.php','_self')" class="button">END ORDER</button>
        </div>    
    </div>    

    <div class="col">
        <div class="rightside">
            <table>
            <tr>
                <th>Dish ID</th>
                <th>Dish Name</th>
                <th>Price</th>
                <th>Quantity</th>
            </tr>

            <?php
                $conn=mysqli_connect("localhost","root","","rsm");
                if($conn->connect_error)
                {
                    die("connection failed". $conn->connect_error);
                }
            
                $q="select l.dish_id, d.D_name,d.price,l.quantity from dishes d JOIN listofitems l on d.Dish_id = l.dish_id where l.order_num='$ordrid'";
                $result = mysqli_query($conn,$q);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>". $row["dish_id"]. "</td><td>". $row["D_name"]. "</td><td>" . $row["price"] . "</td><td>" . $row["quantity"] . "</td></tr>";
                        
                    }
                    echo "</table>";
                } else {
                    echo '<span style="color: white ;text-align:center;">no dishes added</span>';
                }
                $conn->close();

            ?>
            </table>
                <br><br>
                <table>
            <tr>
                <th>TOTAL</th>
            </tr>

            <?php
                $conn=mysqli_connect("localhost","root","","rsm");
                if($conn->connect_error)
                {
                    die("connection failed". $conn->connect_error);
                }
            
                $q="select total from orderrecord where order_num='$ordrid'";
                $result = mysqli_query($conn,$q);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>". $row["total"]. "</td></tr>";
                        
                    }
                    echo "</table>";
                } else {
                    echo '<span style="color: white ;text-align:center;">no dishes added</span>';
                }
                $conn->close();

            ?>
            </table>

        </div>    
        
    </div>    
</div>

</body>
</html>

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
</style>
</head>
<body style="background-color:black;">

<div class="header">
    
    <a href="index.php">
        <img src="images/logoo.png" alt="" width="100" height="100" >
      </a>
      <h1 style="color:white;">PAYMENT</h1>    
 
</div>
<?php $conn = mysqli_connect ('localhost','root','','rsm'); 
    $ordrid=$_SESSION['currorder'];
?>
<div class="row">
    <div class="col">
        <div class="leftside">
        <h2 style="color:white; padding-left: 250px;" >ORDER# <?php echo "$ordrid"?></h2>
        <form action="" method="post" style="padding-left: 250px;">
        <input type="number" name="paid" placeholder="PAID AMOUNT"><br>
        <input type="submit" class="button" value="PAYMENT RECEIVED" name="btn" >
        </form>
        
        <?php
                 $uidq = "SELECT Cust_id  FROM orderrecord where order_num='$ordrid'";        
                 $runuidq = mysqli_query($conn,$uidq);
                 $row = mysqli_fetch_array($runuidq); 
                 $uid = $row['Cust_id'];
                 $scq = "SELECT credit  FROM starcard where Scard_num=(select Scard_num from customers where Cname = '$uid')";        
                 $runscq = mysqli_query($conn,$scq);
                 $row = mysqli_fetch_assoc($runscq); 
                 $sc = $row['credit'];
                 

                 if($sc>=300)
                 {
                     echo '<br><br><h4 style="color:white; padding-left: 230px;" >15% dicount available</h4>';
                     echo '<form action="" method="post" style="padding-left: 0;">
                     <input type="submit" class="button" value="avail discount" name="dis" style="margin-left: 270px;">
                     </form>';
                     
                    

                 }
                if(isset($_POST['btn']))
                {
                    $pay=$_POST['paid'];
                    $totalq = "select total from orderrecord where order_num='$ordrid'";        
                    $runtotalq = mysqli_query($conn,$totalq);
                    $row = mysqli_fetch_array($runtotalq); 
                    $sum = $row['total'];

                    $getuidq="SELECT Cust_id FROM orderrecord where order_num='$ordrid'" ;
                    $rungetuidq=mysqli_query($conn,$getuidq);
                    $rowgetuidq=mysqli_fetch_array($rungetuidq);
                    $uid=$rowgetuidq['Cust_id'];

                    

                    $_SESSION['total']=$sum;
                    $_SESSION['paid']=$pay;
                    if($pay != null && $pay>=$sum)
                    {
                        $credss = 0;
                        function calculatecreds($hmm) {
                            $credss = 0;
                            while($hmm>999)
                            {
                                $hmm=$hmm-1000;
                                $credss+= 100;
                            }
                            return $credss;
                        }
                        $credss=calculatecreds($sum);
                        $updatescard="UPDATE starcard SET credit=credit+$credss WHERE Scard_num like (SELECT Scard_num from customers where Cname='$uid')";
                        $runupdatescard=mysqli_query($conn,$updatescard);
                        $ans=$pay-$sum;
                        $_SESSION['return']=$ans;
                        
                        echo '<span style="color:white;text-align:center;">Return: ' . $ans .' </span>';

                        echo "<script>window.open('receipt.php','_blank')</script>";
                        echo "<br><br>";
                        echo "<a href=index.php >GO BACK</a>";
                    }
                    else{
                        echo '<span style="color: white ;text-align:center;">enter valid amount</span>';
                    }
                
                }
                
        ?>
        
        <br><br>
        </div>    
    </div>    

    <div class="col">
        <div class="rightside">
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
                        $ttl=$row["total"];
                    }
                    echo "</table>";
                } else {
                    echo "no dishes added";
                }
                if(isset($_POST['dis']))
                {
                    echo "here";
                    
                    echo $ttl;
                    $newttl=($ttl-($ttl*0.15));
                    echo $newttl;
                    $updateq="update orderrecord set total = '$newttl' where order_num='$ordrid'";
                    $runupdateq= mysqli_query($conn,$updateq);
                    $updateq="update starcard set credit = credit-300 where Scard_num=(select Scard_num from customers where Cname = '$uid')";
                    $runupdateq= mysqli_query($conn,$updateq);
                    if($runupdateq==true)
                    {
                        echo "yes";
                    }
                    $url1="endorder.php";
                    header("Refresh: 0; URL=$url1");
                }
                $conn->close();

            ?>
            </table>

            <br><br>
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
                    echo "no dishes added";
                }
                $conn->close();

            ?>
            </table>

        </div>    
        
    </div>    
</div>
<!-- <div class="split left">
<div class="centered">
<br><br>
<button onclick="window.open('http://localhost/hungersmash/displaymenu.php','_blank')" class="button">Show Menu</button>
<br><br>
<button onclick="window.open('http://localhost/hungersmash/adddish.php','self')" class="button">ADD DISH</button>
<br><br>
<button class="button">Pill Button 3</button>

</div>
</div>

<div class="split right">
<div class="centered">
<img src="images/logo.png" alt="" width="300" height="300" >
<h2>hungersmash</h2>
</div>
</div> -->
</body>
</html>

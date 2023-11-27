<?php 
    session_start();
    $conn=mysqli_connect("localhost","root","","rsm");
    if($conn->connect_error)
    {
        die("connection failed". $conn->connect_error);
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit info</title>
  <link type="text/css" rel="stylesheet" href="style.css">
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
<div class="header">
    
    <a href="index.php">
        <img src="images/logoo.png" alt="" width="100" height="100" >
      </a>
</div>
<?php
$Unamee=$_SESSION['lgin'];
$q="select * from users where Uname='$Unamee'";
$result=mysqli_query($conn,$q);
$ans=$result->fetch_assoc();
$fname=$ans['FullName'];
$pass=$ans['Upassword'];
$emaill=$ans['email'];
$telnum=$ans['telnum'];
$addr=$ans['address'];
?>
<div class="container">
  <h2 style="color:white;">Edit info</h2>
  <form action="" method="POST">

    <div class="form-group">
      <label style="color:white;">Username:</label>
      <input type="text" class="form-control" id="uname" placeholder="<?php echo $Unamee?>" name="uname">
    </div>

    <div class="form-group">
      <label for="pwd" style="color:white;">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="<?php echo $pass?>" name="pswd">
    </div>


    <div class="form-group">
      <label style="color:white;">Full Name:</label>
      <input type="text" class="form-control" id="fulname" placeholder="<?php echo $fname?>" name="fname">
    </div>

    <div class="form-group">
      <label for="pwd" style="color:white;">address:</label>
      <textarea class="form-control" name="addr" placeholder="<?php echo $addr?>"></textarea>
    </div>

    <div class="form-group">
      <label for="pwd" style="color:white;">Contact Number:</label>
      <input type="text" class="form-control" id="tel" placeholder="<?php echo $telnum?>" name="tel">
    </div>

    <div class="form-group">
      <label for="pwd" style="color:white;">Email:</label>
      <input type="email" class="form-control" id="pwd" placeholder="<?php echo $emaill?>" name="wemail">
    </div>

    
</div>
    <input type="submit" class="button" name="addubtn" value="Update!"></button>
    
   <?php
   if(isset($_POST['addubtn']))
   {
    $Duname =$_POST['uname'];
    $Dpass =$_POST['pswd'];
    $DName= $_POST['fname'];
    $Daddr=$_POST['addr'];
    $telno=$_POST['tel'];
    $Demail=$_POST['wemail'];

    if($Duname!=null)
    {
        $Unamee= $Duname;
    }
    if($Dpass!=null){
        $pass=$Dpass;
    }
    if($DName!=null)
    {
        $fname= $DName;
    }
    if($Daddr!=null)
    {
        $addr=$Daddr;
    }
    if($telno!=null)
    {
        $telnum= $telno;
    }
    if($Demail!=null)
    {
        $emaill=$Demail;
    }
    $q="update users set Uname='$Unamee', Upassword='$pass',FullName='$fname',address='$addr',telnum='$telnum',email='$emaill' where Uname='$Unamee'";
    $result=mysqli_query($conn,$q);
    if($result=true)
    {
        echo '<span style="color: white ;text-align:center;">Updated succesfully</span>';
    }
    else{
        echo '<span style="color: white ;text-align:center;">Error. Try again</span>';
    }
   }
    
   ?>
    
  </form>
</div>

</body>
</html>

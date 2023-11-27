<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
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
<br><br>
<div class="container">
  <h2 style="color:white;">Add new user</h2>
  <form action="laststep.php " method="POST">

    <div class="form-group">
      <label style="color:white;">Username:</label>
      <input type="text" class="form-control" id="uname" placeholder="Enter Username (It should be unique)" name="uname">
    </div>

    <div class="form-group">
      <label style="color:white;" for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
    </div>


    <div class="form-group">
      <label style="color:white;" >Full Name:</label>
      <input type="text" class="form-control" id="fulname" placeholder="Enter Your Fullname" name="fname">
    </div>

    <div class="form-group">
      <label style="color:white;" for="pwd">address:</label>
      <textarea class="form-control" name="addr"></textarea>
    </div>

    <div class="form-group">
      <label style="color:white;" for="pwd">Contact Number:</label>
      <input type="text" class="form-control" id="tel" placeholder="Enter Number" name="tel">
    </div>

    <div class="form-group">
      <label style="color:white;" for="pwd">Email:</label>
      <input type="email" class="form-control" id="pwd" placeholder="Enter Enmail" name="wemail">
    </div>

    <p style="color:white;">Utype<br>
    <select name="Wutype">
    <option value="">[Choose Option Below]</option>
    <option value="Customer">Customer</option>
    <option value="Basic Staff">Basic Staff</option>
    <option value="Kitchen Staff">Kitchen Staff</option>
</select><br>
</div>
    <input type="submit" class="button" name="addubtn"></button>
   
    
  </form>
</div>

</body>
</html>

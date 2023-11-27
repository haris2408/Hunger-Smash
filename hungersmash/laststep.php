<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <?php
    $conn = mysqli_connect ('localhost','root','','rsm');
    if(isset($_POST['addubtn']))
    {
        $Duname =$_POST['uname'];
        $Dpass =$_POST['pswd'];
         $DName= $_POST['fname'];
         $Daddr=$_POST['addr'];
         $telno=$_POST['tel'];
         $Demail=$_POST['wemail'];
         $Dutype=$_POST['Wutype'];
         $_SESSION['ty']=$Duname;
        $checc="select Uname from users where Uname='$Duname'";
        $run=mysqli_query($conn,$checc);
        $creds=mysqli_fetch_array($run);
        
        if($creds != null)
        {
            echo '<span style="color: black ;text-align:center;">User Name already exists. Try again</span>';
            echo"<a href=index.php>Go back to login page</a>";

        }
        else
        {
            $insert = "INSERT INTO USERS(Uname,Upassword,FullName,address,telnum,email,Utype) VALUES('$Duname','$Dpass','$DName','$Daddr','$telno','$Demail','$Dutype')";
            $run_insert= mysqli_query($conn,$insert);
            if($run_insert == true)
            {
                echo '<span style="color: white ;text-align:center;">User added add ho gaya <br></span>';
                echo '<span style="color: white ;text-align:center;">User added \n mubarkan <br></span>';
                if($Dutype == "Customer")
                {   
                  //  echo "<script>window.open('laststep.php','_self')</script>";
                  $conn = mysqli_connect ('localhost','root','','rsm');
                  $aval="select Scard_num from starcard where assigned=false";
                  $run=mysqli_query($conn,$aval);
                  $sca=mysqli_fetch_array($run);
                  $sc=$sca['Scard_num'];
                  $crdasgn_q = "UPDATE starcard SET assigned = true  WHERE Scard_num='$sc'";
                  $crdasgn_r=mysqli_query($conn,$crdasgn_q);
                  
                  $q="INSERT INTO customers(Cname,Scard_num) VALUES('$Duname','$sc')";
                  $run=mysqli_query($conn,$q);
                  echo "<script>window.open('gotologinpage.php','_self')</script>";
                }
                else
                {
                    echo "<script>window.open('staffsignup.php','_self')</script>";
                }
                
            }
            else
            {
                echo '<span style="color: white ;text-align:center;">Error. Try Again</span>';
                echo '<span style="color: white ;text-align:center;">nai hoa</span>';
            }
        }
    }

    
  
   
 ?> 
</body>
</html>

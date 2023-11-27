<?php
     session_start();
     $_SESSION['lgin'] = null;
     echo "<script>window.open('index.php','_self')</script>";
?>
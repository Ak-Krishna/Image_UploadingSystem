<?php 
  
  require('./components/_head.php');
  
   $sessionLoggedInValue = (isset($_SESSION['loggedIn']) && !is_null($_SESSION['loggedIn'])) ?  $_SESSION['loggedIn'] :  "false";
   // echo "<script>alert('$sessionLoggedInValue');</script>";

   
?>

  <!-- main content -->
  <div class="content" id="content">

   <!-- breadcrum -->
   <?php
     include "./components/_breadcrum.php";
   ?>
   <?php
      if(!isset($_SESSION['loggedIn']) && $sessionLoggedInValue == "false"){
      include("./login.php");
      echo "<script>window.location.replace('./login.php')</script>";
      die();
   }
   ?>
   
<?php
    require('./components/_foot.php');
?>
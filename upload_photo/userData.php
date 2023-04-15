<?php
   require('./components/_head.php');

   $sessionLoggedInValue = (isset($_SESSION['loggedIn']) && !is_null($_SESSION['loggedIn'])) ?  $_SESSION['loggedIn'] :  "false";
   // echo "<script>alert('$sessionLoggedInValue');</script>";

   if(!isset($_SESSION['loggedIn']) && $sessionLoggedInValue == "false"){
      header('location: ./login.php');
      echo "<script>window.location.replace('./login.php')</script>";
      die();
   }
?>

  <!-- main content -->
  <div class="content" id="content">
   <!-- dash-items -->
   <div class="breadcrum">
    <h3 class="breadcrum-title">Profile Details</h3>
   </div>

   <?php
    include "./main_items/_user.php";
   ?>

<?php
    require('./components/_foot.php');
?>
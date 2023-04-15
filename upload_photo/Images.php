<?php
require('./components/_head.php');
// require("./database/dbConn.php");
// require("./functions.inc.php");
$sessionLoggedInValue = (isset($_SESSION['loggedIn']) && !is_null($_SESSION['loggedIn'])) ?  $_SESSION['loggedIn'] :  "false";
// echo "<script>alert('$sessionLoggedInValue');</script>";

if (!isset($_SESSION['loggedIn']) && $sessionLoggedInValue == "false") {
    header('location: ./login.php');
    echo "<script>window.location.replace('./login.php')</script>";
    die();
}
// var_dump($sessionLoggedInValue);

if (isset($_POST['delete_image'])) {
    $delete_id = $_POST['image_id'];

    //INSERT IMGAES TO DELETED SECTION
    $sql1 = "SELECT * FROM `images` where `name`='$delete_id';";
    $results = array();
    if ($result1 = $mysqli->query($sql1)) {
        $results = $result1->fetch_all(MYSQLI_ASSOC);
        $sql2 = "INSERT INTO `deleted_image_data`( `Name`, `size`, `image`) VALUES ('$results[0]['name']','$results[0]['size']','$results[0]['image'])";
        $mysqli->query($sql2);
    }

    //DELETE IMAGE FROM DELETED SECTION
    $sql = "DELETE FROM `images` where `name`='$delete_id'";
    $result = $mysqli->query($sql);
    try {
        if ($result) {
            $status = "success";
            $title = "Deleted Successfully";
            unlink("./UploadImages/" . $delete_id);
            header('location:./images.php');
        }
    } catch (Throwable $th) {
        $msg = $th->getMessage();
        $title = "Cannot delete Image";
        $status = "warning";
    } finally {
        echo '<script>
                swal({
                  title: "' . $title . '",
                  text: "' . $msg . '",
                  icon: "' . $status . '",
                });
              </script>';
    }
}

?>

<!-- main content -->
<div class="content" id="content">
    <!-- dash-items -->
    <div class="breadcrum">
        <h3 class="breadcrum-title">Image Data</h3>
    </div>

    <?php
    include "./main_items/_images_list.php";
    ?>

    <?php
    require('./components/_foot.php');
    ?>
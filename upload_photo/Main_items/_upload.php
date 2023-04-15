<?php
// var_dump($branches);
include "./functions.inc.php";
if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD']) {
  $name = $_POST['name'];
  $file = $_FILES['file'];

  $filename = $file["name"];
  $fileext = explode(".", $filename);
  $filetemp = $file["tmp_name"];
  $size = formatSizeUnits($file["size"]);
  //checking for extentions
  $filecheck = strtolower(end($fileext));
  $fileextstored = array('png', 'jpg', 'jpeg');
  
  //checking file extention and uploading images
  if (in_array($filecheck, $fileextstored)) {
    $destinationFile = './UploadImages/' . $filename;
    move_uploaded_file($filetemp, $destinationFile);
    $sql = "INSERT INTO `images`(`name`, `size`, `image`,`thumbnail`) VALUES('$filename','$size','$destinationFile','$filecheck')";
    $sql1="SELECT `name` from `images` where `name`='$filename";
    if(($result1=$mysqli->query($sql))>0){
      '<script>
          swal({
            title: "File With This Name Already Exist",
            icon: "warning",
            status:"warning",
          });
        </script>';
    }
    else{
    $result = $mysqli->query($sql);

    $status = "warning";
    $msg = "";
    $title = "";

    try {
      if ($result) {
        $status = "success";
        $title = "Uploaded Successfully";
        header('location:./Images.php');
      }
    } catch (Throwable $th) {
      $msg = $th->getMessage();
      $title = "File Should be in format of (jpg,jpeg,png)";
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
  }
  else{
    echo '<script>
          swal({
            title: "File Should be in format of (jpg,jpeg,png)",
            text: "Could not upload",
            icon: "warning",
          });
        </script>';
  }

}

?>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);  ?>" method="POST" class="modal__form" enctype="multipart/form-data">

  <div class="form-input-group">
    <label for="name" class="form-label">Name</label>
    <input type="text" id="name" name="name" class="form-input" placeholder="Enter name" required>
  </div>
  <div class="form-input-group">
    <label for="class" class="form-label">Image</label>
    <input type="file" id="class" name="file" class="form-input" required>
  </div>

  <div class="form-input-group">
    <button type="submit" value="sumbit" name="submit" class="form-input form-btn">upload</button>
  </div>
</form>
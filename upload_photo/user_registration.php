

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/login.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Register-Image Store | User-Registration</title>
</head>

<body>
<?php
include"./functions.inc.php";
    if (isset($_POST['user_form']) && $_SERVER['REQUEST_METHOD'] == "POST") {
        $name = $_POST['username'];
        $email = $_POST['userEmail'];
        $file = $_FILES['fileToUpload'];
        $password = htmlspecialchars($_POST['userPassword']);
        $cPassword = htmlspecialchars($_POST['userCPassword']);


        print_r($file);
        $status = "warning";
        $msg = "";
        $title = "";
        //checking for files
        $filename = $file["name"];
        $fileext = explode(".", $filename);
        $filetemp = $file["tmp_name"];
        $size = formatSizeUnits($file["size"]);
        //checking for extentions
        $filecheck = strtolower(end($fileext));
        $fileextstored = array('png', 'jpg', 'jpeg');

        if (in_array($filecheck, $fileextstored)) {
            $destinationFile = './UploadImages/' . $filename;
            move_uploaded_file($filetemp, $destinationFile);
            if ($password == $cPassword) {
                // BYCRYPT THE PASSWORD
                // $hash = password_hash($password, CRYPT_BLOWFISH);
                $status = 0;

                $sql = "INSERT INTO `user_data`(`username`, `emailId`, `password`, `user_Image`) VALUES ('$name','$email','$password','$destinationFile')";

                try {
                    if ($result = $mysqli->query($sql)) {
                        $status = "success";
                        $title = "Account Created!. Login to profile";
                        header("location:./login.php");
                    }
                } catch (Throwable $th) {
                    $msg = $th->getMessage();
                    $title = "Something Went Wrong";
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
        }else{
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

    <section class="container-half">
        <div class="login_header">
            <h1>Welcome to Image - Store</h1>
            <h2>User Registration</h2>
        </div>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
            <div class="form-input-group-container">
                <div class="form-input-group">
                    <label class="form-label" for="name">Name</label>
                    <input type="text" placeholder="Name" class="form-input " name="username" id="name" required>
                </div>
                <div class="form-input-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" class="form-input" placeholder="Enter email" name="userEmail" required>
                    <p class="input_error">
                        <!-- <?php echo $error; ?> -->
                    </p>
                </div>
                <div class="form-input-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="text" id="password" class="form-input" placeholder="Enter password"
                        name="userPassword" required>
                    <p class="input_error"></p>
                </div>
                <div class="form-input-group">
                    <label for="Cpassword" class="form-label">Confirm Password</label>
                    <input type="text" id="Cpassword" class="form-input" placeholder="Confirm Password"
                        name="userCPassword" required>
                    <p class="input_error"></p>
                </div>
                <div class="form-input-group">
                    <label for="contact" class="form-label">Profile</label>
                    <input type="file" id="contact" class="form-input"
                        name="fileToUpload" required>
                    <p class="input_error"></p>
                </div>
                <div class="form-input-group">
                    <button type="submit" value="submit" name="user_form" class="form-input form-btn">Create Account</button>
                </div>
                <a href="./login.php" class="link-primary">Already have an account?</a>
            </div>

        </form>
    </section>
</body>


</html>
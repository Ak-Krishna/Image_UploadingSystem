<?php
    require('functions.inc.php');
    $sessionLoggedInValue = (isset($_SESSION['loggedIn']) && !is_null($_SESSION['loggedIn'])) ?  $_SESSION['loggedIn'] :  "false";
    // echo "<script>alert('$sessionLoggedInValue');</script>";

    if(isset($_SESSION['loggedIn']) && $sessionLoggedInValue == "true"){
        header('location: ./');
        // echo "<script>window.location.replace('./')</script>";
        die();
    }

    $error = "";

    if(isset($_POST['login']) && $_SERVER['REQUEST_METHOD']=="POST"){
        $email = escape_and_lower($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
         
        //$sql = "SELECT * FROM `user_data` WHERE `email`='$emailId';";
        $result = fetch_admin($email);

        // $hash = (isset($result[0]['password']) && !is_null($result[0]['password'])) ? $result[0]['password'] :  'dfladfaafa;8347923';
        // var_dump($password==$result[0]['password']);
        if((!is_null($result) && count($result) == 1) && ($password==$result[0]['password'])){

            // TODO: login the user to the dashboard page
            session_start();
            $_SESSION['id'] = $result[0]['User_id'];
            $_SESSION['username'] = $result[0]['username'];
            $_SESSION['email'] = $result[0]['emailId'];
            $_SESSION['loggedIn'] = "true";
             header('location: ./userData.php');
            echo $_SESSION['username'];

        }else{
            $error = "Invalid Credential";
        }
    }



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/login.css">
    <title>Login-DashBoard</title>
</head>

<body>
    <section class="container-half">
        <div class="login_header">
            <h1>Welcome To Image-Store 🖐</h1>
            <h2>Login</h2>
        </div>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <div class="form-input-group-container">
                <div class="form-input-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" class="form-input" placeholder="Enter email" name="email">
                    <p class="input_error"><?php echo $error; ?></p>
                </div>
                <div class="form-input-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" class="form-input" placeholder="Enter password"
                        name="password">
                    <p class="input_error"></p>
                </div>
                <div class="form-input-group">
                    <button type="submit" value="submit" name="login" class="form-input form-btn">Login</button>
                    <a href="./user_registration.php" class="link-primary">Don't have account?</a>
                    
                </div>
            </div>

        </form>
    </section>

</body>

</html>
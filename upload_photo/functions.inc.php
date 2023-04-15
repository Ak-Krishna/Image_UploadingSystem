<?php
require_once "./database/dbConn.php";
   
function escape_and_lower($value){
    return strtolower(htmlspecialchars($value));
}
//FUNCTION TO FETCH IMAGES
function fetch_image(){
    $sql = "SELECT * FROM `images`;";
    global $mysqli;
    $results = array();

    try {
        if($result = $mysqli->query($sql)){
            $results = $result -> fetch_all(MYSQLI_ASSOC);
        }
    } catch (Throwable $th) {
        echo $th->getMessage();
    } finally{
        return $results;
    }
}
//FUNCTION TO FETCH DELETED IMAGE
function fetch_deleted_image(){
    $sql = "SELECT * FROM `deleted_image_data`;";
    global $mysqli;
    $results = array();

    try {
        if($result = $mysqli->query($sql)){
            $results = $result -> fetch_all(MYSQLI_ASSOC);
        }
    } catch (Throwable $th) {
        echo $th->getMessage();
    } finally{
        return $results;
    }
}
// FUNCTION TO GENERATE UNIQUE USER TOKEN
function generateToken(){
    $randomValue = random_bytes(10);
    $token = bin2hex($randomValue);
    $results = array();

    global $mysqli;

    $sql = "SELECT COUNT(`token`) AS `count` FROM `user_data` WHERE 'token'='$token';";

    try {
        if($result = $mysqli->query($sql)){
            $results = $result->fetch_all(MYSQLI_ASSOC);
            array_push($results, $token);
        }
    } catch (Throwable $th) {
        echo $th -> getMessage();
    }finally{
        return $results;
    }
}

// FUNCTION TO FETCH ADMIN
function fetch_admin($emailId){
    global $mysqli;
    $results=array();

    if(!is_null($emailId)){
        $sql = "SELECT * FROM `user_data` WHERE `emailId`='$emailId';";
    }else{
        $sql = "SELECT `username`,`emailId`,`contact`,`status`,`date` FROM `user_data`;";
    }

    
    try {
        if($result = $mysqli->query($sql)){
            $results = $result->fetch_all(MYSQLI_ASSOC);
        }
    } catch (Throwable $th) {
        echo $th -> getMessage();
    } finally{
        return $results;
    }
}
//FUNCTION TO CHANGE SIZE OF IMAGES
function formatSizeUnits($bytes)
{
    if ($bytes >= 1073741824)
    {
        $bytes = number_format($bytes / 1073741824, 2) . ' GB';
    }
    elseif ($bytes >= 1048576)
    {
        $bytes = number_format($bytes / 1048576, 2) . ' MB';
    }
    elseif ($bytes >= 1024)
    {
        $bytes = number_format($bytes / 1024, 2) . ' KB';
    }
    elseif ($bytes > 1)
    {
        $bytes = $bytes . ' bytes';
    }
    elseif ($bytes == 1)
    {
        $bytes = $bytes . ' byte';
    }
    else
    {
        $bytes = '0 bytes';
    }

    return $bytes;
}

?>
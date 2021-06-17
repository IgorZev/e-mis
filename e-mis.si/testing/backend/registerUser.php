<?php
$api_key_value = "zDK3yYY839";


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $api_key = $_POST['api_key'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $username = $_POST['username'];
    $phone = $_POST['phone'];
}else{
    echo "No data to proccess!";
    return;
}

if($api_key_value == $api_key){

    $conn = mysqli_connect("localhost", "admin", "minelord", "emis_si");

    if (!$conn){
        echo "Connnection_Error";
        return;
    }

    echo "Connected...<br>";
    $sql = "INSERT INTO user (email, create_date, password, username) VALUES ('$email', CURRENT_TIMESTAMP, '$password', '$username');";
    
    
    if($result = mysqli_query($conn, $sql)){
        echo "ok_200";	
    }else{
        echo "Server_Error";
    }
}else{
    echo "Wrong key! Terminating connection..";
    return;
}

?>





<?php
$api_key_value = "zDK3yYY839";
$date = date("Y-m-d",time() + 9*3600);
$time = date("H:i:s",time() + 9*3600);


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $api_key = $_POST['api_key'];
    $deviceId = $_POST['deviceId'];
}else{
    echo "No data to proccess!";
    return;
}

if($api_key_value == $api_key){

    $conn = mysqli_connect('mysql.e-mis.si', 'emis', 'RT52o8EHul@6gla#3L#o', 'emis_si');

    if (!$conn){
        echo "Server_Connection_Error";
        return;
    }

    echo "202_ok";
    $sql = "INSERT INTO data(date, time, device_id) VALUES('$date', '$time', '$deviceId')";
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

<?php
$api_key_value = "zDK3yYY839";


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $api_key = $_POST['api_key'];
    $user = $_POST['user'];
    $version = $_POST['user'];
    $lat = $_POST['lat'];
    $long = $_POST['long'];
    $battery = $_POST['battery'];
    $code = $_POST['battery'];
}else{
    echo "No data to proccess!";
    return;
}

if($api_key_value == $api_key){

    $conn = mysqli_connect('mysql.e-mis.si', 'emis', 'RT52o8EHul@6gla#3L#o', 'emis_si');

    if (!$conn){
        echo "Connnection_Error";
        return;
    }

    echo "Connected...<br>";
    $sql = "INSERT INTO device (user_id, version, location_lat, location_long, battery, name, Code, changed_name) VALUES ( '$user', '$version', '$lat', '$long', '$battery', 0, '$code',0);";
    
    
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





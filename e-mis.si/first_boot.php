<?php
$api_key_value = "zDK3yYY839";
$date = date("Y-m-d",time() + 9*3600);
$time = date("H:i:s",time() + 9*3600);


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $api_key = $_POST['api_key'];
}else{
    echo "No data to proccess!";
    return;
}

if($api_key_value == $api_key){

    $conn = mysqli_connect("mysql.e-mis.si", "emis", "RT52o8EHul@6gla#3L#o", "emis_si");

    if (!$conn){
        echo "Server_Connection_Error";
        return;
    }

    $sql = "INSERT INTO device(user_id, version) VALUES('1', 'beta')";
    if($result = mysqli_query($conn, $sql)){
        $last_id = $conn->insert_id;
        echo $last_id;
    }else{
        echo "Server_Error";
    }
}else{
	echo $api_key;
    echo "Wrong key! Terminating connection..";
    return;
}

?>

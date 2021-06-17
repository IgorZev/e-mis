<?php
$api_key_value = "zDK3yYY839";
$Json_data = array();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $api_key = $_POST['api_key'];
}else{
    echo "No data to proccess!";
    //return;
    $api_key = "zDK3yYY839";
}

if($api_key_value == $api_key){

    $conn = mysqli_connect("localhost", "admin", "minelord", "emis_si");

    if (!$conn){
        echo "Server_Error";
        return;
    }
   // echo "Connected...<br>";
    
    $sql = "SELECT * FROM user";
    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($result)){
        array_push($Json_data, array('userId' => $row['id'], 'username' => $row['username']));
    }
    echo json_encode($Json_data);
}else{
    echo "Wrong key! Terminating connection..";
    return;
}


?>





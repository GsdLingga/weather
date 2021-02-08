<?php
    include 'connection.php';
    date_default_timezone_set('Asia/Makassar');
    $request = file_get_contents('php://input');
    
    $data = json_decode($request, true);
    // $id = mysqli_real_escape_string($dbconnect, $data['id']);
    $lat = mysqli_real_escape_string($dbconnect, $data['lat']);
    $lng = mysqli_real_escape_string($dbconnect, $data['lng']);
    $interval = date("Y-m-d h:i:s");
    $sql = mysqli_query($dbconnect, "INSERT INTO tb_air (tb_air.`latitude`, tb_air.`longitude`, tb_air.`interval`) VALUES ('$lat', '$lng', '$interval')");
    if ($sql) {
        $response = "sukses";
        echo $data;
    } else {
        $response = "gagal";
    }
    echo $response;
    echo $data;
?>
<?php
    include 'connection.php';
    date_default_timezone_set('Asia/Makassar');
    $request = file_get_contents('php://input');
    
    $data = json_decode($request, true);
    // $id = mysqli_real_escape_string($dbconnect, $data['id']);
    $temp = mysqli_real_escape_string($dbconnect, $data['temp']);
    $hum = mysqli_real_escape_string($dbconnect, $data['hum']);
    $interval = date("Y-m-d h:i:s");
    if ($temp == null && $hum == null) {
        echo "Input tidak boleh kosong";
    }else{
        $sql = mysqli_query($dbconnect, "INSERT INTO tb_air (tb_air.`suhu`, tb_air.`kelembaban`, tb_air.`interval`) VALUES ('$temp', '$hum', '$interval')");
        if ($sql) {
            $response = "sukses";
            echo $data;
        } else {
            $response = "gagal";
        }
        echo $response;
    }
?>
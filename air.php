<?php
    include 'connection.php';
    date_default_timezone_set('Asia/Makassar');
    $request = file_get_contents('php://input');
    
    $data = json_decode($request, true);
    // $id = mysqli_real_escape_string($dbconnect, $data['id']);
    $suhu = mysqli_real_escape_string($dbconnect, $data['suhu']);
    $kelembaban = mysqli_real_escape_string($dbconnect, $data['kelembaban']);
    $interval = date("Y-m-d h:i:s");
    $sql = mysqli_query($dbconnect, "INSERT INTO tb_air (tb_air.`suhu`, tb_air.`kelembaban`, tb_air.`interval`) VALUES ('$suhu', '$kelembaban', '$interval')");
    if ($sql) {
        $response = "sukses";
        echo $data;
    } else {
        $response = "gagal";
    }
    echo $response;
?>
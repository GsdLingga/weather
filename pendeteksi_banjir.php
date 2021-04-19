<?php
	include_once "connection.php";
	
    class emp{}
	$id_device = $_GET ["device"];
	$banjir = $_GET ["jarak"];
    $temp = $_GET ["suhu"];
    $hum = $_GET ["kelembaban"];	
    $light = $_GET ["cahaya"];
    $rain = $_GET ["hujan"];
	$sender = $_GET ["sender"];
    date_default_timezone_set('Asia/Makassar');
    $interval = date("Y-m-d H:i:s");
	
	if((empty($id_device) || empty($banjir) || empty($temp) || empty($hum) || empty($light) || empty($rain) || empty($sender))) {
		$response = new emp();
		$response->success = 0;
		$response->message = "Kolom isian tidak boleh kosong";
		die(json_encode($response));
	} else {
		$query = mysqli_query($dbconnect, "INSERT INTO tb_air (tb_air.`id_device`, tb_air.`jarak_air`, tb_air.`suhu`, tb_air.`kelembaban`, tb_air.`intensitas_cahaya`, tb_air.`hujan`, tb_air.`interval`, tb_air.`modul_pengirim`) VALUES('".$id_device."','".$banjir."','".$temp."','".$hum."','".$light."','".$rain."','".$interval."','".$sender."')");
		
		if ($query) {
			$response = new emp();
			$response->success = 1;
			$response->message = "Data Alat Pendeteksi Air berhasil di simpan";
			die(json_encode($response));
		} else{ 
			$response = new emp();
			$response->success = 0;
			$response->message = "Error simpan Data";
			die(json_encode($response)); 
		}	
	}
	mysqli_close($dbconnect);
?>
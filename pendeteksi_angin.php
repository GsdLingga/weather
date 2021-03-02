<?php
	include_once "connection.php";
	
    class emp{}
	$id_device = $_GET ["device"];
	$angin = $_GET ["kecepatan"];
    $temp = $_GET ["suhu"];
    $hum = $_GET ["kelembaban"];	
    $light = $_GET ["cahaya"];
    $rain = $_GET ["hujan"];
    date_default_timezone_set('Asia/Makassar');
    $interval = date("Y-m-d h:i:s");
	
	if((empty($id_device) || empty($temp) || empty($hum) || empty($light) || empty($rain))) {
		$response = new emp();
		$response->success = 0;
		$response->message = "Kolom isian tidak boleh kosong";
		die(json_encode($response));
	} else {
		$query = mysqli_query($dbconnect, "INSERT INTO tb_angin (tb_angin.`id_device`, tb_angin.`kecepatan_angin`, tb_angin.`suhu`, tb_angin.`kelembaban`, tb_angin.`intensitas_cahaya`, tb_angin.`hujan`, tb_angin.`interval`) VALUES('".$id_device."','".$angin."','".$temp."','".$hum."','".$light."','".$rain."','".$interval."')");
		
		if ($query) {
			$response = new emp();
			$response->success = 1;
			$response->message = "Data Alat Pendeteksi Angin berhasil di simpan";
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
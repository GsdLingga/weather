<?php
	include_once "connection.php";
	
    class emp{}
    $temp = $_GET ["suhu"];
    $hum = $_GET ["kelembaban"];
    date_default_timezone_set('Asia/Makassar');
    $interval = date("Y-m-d h:i:s");
	
	if((empty($suhu) || empty($kelembaban))) {
		$response = new emp();
		$response->success = 0;
		$response->message = "Kolom isian tidak boleh kosong";
		die(json_encode($response));
	} else {
		$query = mysqli_query($con, "INSERT INTO tb_air (tb_air.`suhu`, tb_air.`kelembaban`, tb_air.`interval`) VALUES('".$temp."','".$hum."','".$interval."')");
		
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
	mysqli_close($con);
?>
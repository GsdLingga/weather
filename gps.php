<?php
	include_once "connection.php";
	
    class emp{}
	$id_device = $_GET ["device"];
	$lat = $_GET ["lat"];
    $lng = $_GET ["lng"];
    date_default_timezone_set('Asia/Makassar');
    $interval = date("Y-m-d h:i:s");
	
	if((empty($lat) || empty($lng))) {
		$response = new emp();
		$response->success = 0;
		$response->message = "Kolom isian tidak boleh kosong";
		die(json_encode($response));
	} else {
		$query = mysqli_query($dbconnect, "INSERT INTO tb_gps (tb_gps.`id_device`, tb_gps.`latitude`, tb_gps.`longitude`, tb_gps.`interval`) VALUES('".$id_device."','".$lat."','".$lng."','".$interval."')");
		
		if ($query) {
			$response = new emp();
			$response->success = 1;
			$response->message = "Data GPS berhasil di simpan";
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
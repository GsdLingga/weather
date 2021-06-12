<?php
	include_once "connection.php";
	
    class emp{}
	$id_device = $_GET ["id_device"];
	
	if((empty($id_device) )) {
		$response = new emp();
		$response->success = 0;
		$response->message = "Id Device tidak boleh kosong";
		die(json_encode($response));
	} else {
		$query = mysqli_query($dbconnect, 
		"SELECT tb_angin.`id`, tb_angin.`id_device`, tb_angin.`kecepatan_angin`, tb_angin.`suhu`, tb_angin.`kelembaban`, tb_angin.`intensitas_cahaya`, tb_angin.`hujan`, tb_angin.`interval`, tb_gps.`latitude`, tb_gps.`longitude`
		FROM tb_angin, tb_gps
		WHERE tb_angin.`id` IN (SELECT MAX(tb_angin.`id`) FROM tb_angin
		WHERE tb_angin.`id_device` = $id_device)
		AND 
		tb_gps.`id` IN (SELECT MAX(tb_gps.`id`) FROM tb_gps
		WHERE tb_angin.`id_device` = $id_device);");
		
		$row = mysqli_fetch_assoc($query);
		echo json_encode($row);

		// $json = array();
	
        // while($row = mysqli_fetch_assoc($query)){
        //     array_push($json, $row);
        // }
        
        // echo json_encode($json);
	}
	mysqli_close($dbconnect);
?>
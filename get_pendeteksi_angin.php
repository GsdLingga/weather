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
		$query = mysqli_query($dbconnect, "SELECT * FROM tb_angin WHERE tb_angin.`id_device` = $id_device ORDER BY tb_angin.`id` DESC LIMIT 1;");
		
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
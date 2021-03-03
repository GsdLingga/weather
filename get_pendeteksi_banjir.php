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
		$query = mysqli_query($dbconnect, "SELECT * FROM tb_air WHERE tb_air.`id_device` = $id_device ORDER BY tb_air.`id` DESC LIMIT 1;");
		
		// $json = array();
	
        // while($row = mysqli_fetch_assoc($query)){
        //     array_push($json, $row);
        // }

        $result = array();
        $row = mysqli_fetch_array($query);
        array_push($result, array(
            "id"=>$row['id'],
            "id_device"=>$row['id_device'],
            "jarak_air"=>$row['jarak_air'],
            "suhu"=>$row['suhu'],
            "kelembaban"=>$row['kelembaban'],
            "intensitas_cahaya"=>$row['intensitas_cahaya'],
            "hujan"=>$row['hujan'],
        ));
        
        // echo json_encode($json);
        echo json_encode(array('result'=>$result));
	}
	mysqli_close($dbconnect);
?>
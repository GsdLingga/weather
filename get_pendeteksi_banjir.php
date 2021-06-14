<?php
	include_once "connection.php";
	
    // class emp{}
	$id_device = $_GET ["id_device"];
	
	if((empty($id_device) )) {
		$response = new emp();
		$response->success = 0;
		$response->message = "Id Device tidak boleh kosong";
		die(json_encode($response));
	} else {
		$query = mysqli_query($dbconnect, 
        "SELECT tb_air.`id`, tb_air.`id_device`, tb_air.`jarak_air`, tb_air.`suhu`, tb_air.`kelembaban`, tb_air.`intensitas_cahaya`, tb_air.`hujan`, tb_air.`interval`, tb_gps.`latitude`, tb_gps.`longitude`
		FROM tb_air, tb_gps
		WHERE tb_air.`id` IN (SELECT MAX(tb_air.`id`) FROM tb_air
		WHERE tb_air.`id_device` = $id_device)
		AND 
		tb_gps.`id` IN (SELECT MAX(tb_gps.`id`) FROM tb_gps
		WHERE tb_air.`id_device` = $id_device);");
		
        // $json = array();
        $row = mysqli_fetch_assoc($query);
        echo json_encode($row);

        // while($row = mysqli_fetch_assoc($query)){
        //     array_push($json, $row);
        // }

        // echo json_encode($json);

        // $result = array();
        // $row = mysqli_fetch_array($query);
        // array_push($result, array(
        //     "id"=>$row['id'],
        //     "id_device"=>$row['id_device'],
        //     "jarak_air"=>$row['jarak_air'],
        //     "suhu"=>$row['suhu'],
        //     "kelembaban"=>$row['kelembaban'],
        //     "intensitas_cahaya"=>$row['intensitas_cahaya'],
        //     "hujan"=>$row['hujan'],
        // ));
        
        // echo json_encode(array('result'=>$result));
	}

    mysqli_close($dbconnect);
?>
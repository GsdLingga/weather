<?php
	include_once "connection.php";
	
    // class emp{}
	$id_device = $_GET ["id_device"];
	
	// if((empty($id_device) )) {
	// 	$response = new emp();
	// 	$response->success = 0;
	// 	$response->message = "Id Device tidak boleh kosong";
	// 	die(json_encode($response));
	// } else {
		$query = mysqli_query($dbconnect, "SELECT * FROM tb_air WHERE tb_air.`id_device` = $id_device ORDER BY tb_air.`id` DESC LIMIT 1;");
		
	// 	$json = array();
	
    //     while($row = mysqli_fetch_assoc($query)){
    //         array_push($json, $row);
    //     }

    //     echo json_encode($json);

    //     // $result = array();
    //     // $row = mysqli_fetch_array($query);
    //     // array_push($result, array(
    //     //     "id"=>$row['id'],
    //     //     "id_device"=>$row['id_device'],
    //     //     "jarak_air"=>$row['jarak_air'],
    //     //     "suhu"=>$row['suhu'],
    //     //     "kelembaban"=>$row['kelembaban'],
    //     //     "intensitas_cahaya"=>$row['intensitas_cahaya'],
    //     //     "hujan"=>$row['hujan'],
    //     // ));
        
    //     // echo json_encode(array('result'=>$result));
	// }

    $json = '{"pendeteksi_banjir": [';

        // create looping dech array in fetch
        while ($row = mysqli_fetch_array($query)){
    
        // quotation marks (") are not allowed by the json string, we will replace it with the` character
        // strip_tag serves to remove html tags on strings
            $char ='"';
    
            $json .= 
            '{
                "id":"'.str_replace($char,'`',strip_tags($row['id'])).'", 
                "id_device":"'.str_replace($char,'`',strip_tags($row['id_device'])).'",
                "jarak_air":"'.str_replace($char,'`',strip_tags($row['jarak_air'])).'",
                "suhu":"'.str_replace($char,'`',strip_tags($row['suhu'])).'",
                "kelembaban":"'.str_replace($char,'`',strip_tags($row['kelembaban'])).'",
                "intensitas_cahaya":"'.str_replace($char,'`',strip_tags($row['intensitas_cahaya'])).'",
                "hujan":"'.str_replace($char,'`',strip_tags($row['hujan'])).'",
            },';
        }
    
        // omitted commas at the end of the array
        $json = substr($json,0,strlen($json)-1);
    
        $json .= ']}';
    
        // print json
        echo $json;
	mysqli_close($dbconnect);
?>
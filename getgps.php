<?php
	include_once "connection.php";
	
    $query = mysqli_query($dbconnect, "SELECT tb_gps.`id`,tb_gps.`id_device`, tb_gps.`latitude`, tb_gps.`longitude`, tb_device.`tipe_device` FROM tb_gps JOIN tb_device ON tb_gps.`id_device` = tb_device.`id` WHERE tb_gps.`id` IN (SELECT MAX(tb_gps.`id`) FROM tb_gps GROUP BY tb_gps.`id_device`)");
	
	$json = '{"lokasi": [';

	// create looping dech array in fetch
	while ($row = mysqli_fetch_array($query)){

	// quotation marks (") are not allowed by the json string, we will replace it with the` character
	// strip_tag serves to remove html tags on strings
		$char ='"';

		$json .= 
		'{
			"id":"'.str_replace($char,'`',strip_tags($row['id'])).'", 
			"id_device":"'.str_replace($char,'`',strip_tags($row['id_device'])).'",
			"lat":"'.str_replace($char,'`',strip_tags($row['latitude'])).'",
			"lng":"'.str_replace($char,'`',strip_tags($row['longitude'])).'"
		},';
	}

	// omitted commas at the end of the array
	$json = substr($json,0,strlen($json)-1);

	$json .= ']}';

	// print json
	echo $json;
    
	mysqli_close($dbconnect);
?>
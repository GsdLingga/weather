<?php
	include_once "connection.php";
	
    $query = mysqli_query($dbconnect, "SELECT tb_angin.`id`,tb_angin.`id_device`, tb_angin.`kecepatan_angin` FROM tb_angin WHERE tb_angin.`id` IN (SELECT MAX(tb_angin.`id`) FROM tb_angin GROUP BY tb_angin.`id_device`)");
	
	$json = '{"angin": [';

	// create looping dech array in fetch
	while ($row = mysqli_fetch_array($query)){

	// quotation marks (") are not allowed by the json string, we will replace it with the` character
	// strip_tag serves to remove html tags on strings
		$char ='"';

		$json .= 
		'{
			"id":"'.str_replace($char,'`',strip_tags($row['id'])).'", 
			"id_device":"'.str_replace($char,'`',strip_tags($row['id_device'])).'",
			"kecepatan_angin":"'.str_replace($char,'`',strip_tags($row['kecepatan_angin'])).'"
		},';
	}

	// omitted commas at the end of the array
	$json = substr($json,0,strlen($json)-1);

	$json .= ']}';

	// print json
	echo $json;
    
	mysqli_close($dbconnect);
?>
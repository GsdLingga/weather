<?php
	include_once "connection.php";
	
    class emp{}
	$id_device = $_GET ["id_device"];
	
    $query = mysqli_query($dbconnect, "SELECT * FROM tb_air WHERE tb_air.`id_device` = $id_device ORDER BY tb_air.`id` DESC LIMIT 1;");
    
    $json = array();

    while($row = mysqli_fetch_assoc($query)){
        array_push($json, $row);
    }
    
    echo json_encode($json);

	mysqli_close($dbconnect);
?>
<?php
    $dbhost = 'dfkpczjgmpvkugnb.cbetxkdyhwsb.us-east-1.rds.amazonaws.com'; 
    $dbuser = 'z2twzks8z5vlfnnj';
    $password = 'u6no75mzj8xs4zlg';
    $dbname = 'nhaataee8fmkl624';
    
    $dbconnect = mysqli_connect($dbhost, $dbuser, $password, $dbname);
    
    if (mysqli_connect_errno()) {
		echo "Gagal terhubung MySQL: " . mysqli_connect_error();
	}
    // if ($dbconnect->connect_error) {
    //     die('Server Error');
    // }
?>
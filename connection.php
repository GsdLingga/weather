<?php
    $dbhost = 'XXXXX'; 
    $dbuser = 'XXXXX';
    $password = 'XXXXX';
    $dbname = 'XXXXX';
    
    $dbconnect = new mysqli($dbhost, $dbuser, $password, $dbname);
    
    if ($dbconnect->connect_error) {
        die('Server Error');
    }
?>
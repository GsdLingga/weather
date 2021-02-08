<?php
    $dbhost = 'jhdjjtqo9w5bzq2t.cbetxkdyhwsb.us-east-1.rds.amazonaws.com'; 
    $dbuser = 'pfd8t0xaned50eht';
    $password = 'woz1clw96w5rj8ao';
    $dbname = 'f99amrfa27evlgbq';
    
    $dbconnect = new mysqli($dbhost, $dbuser, $password, $dbname);
    
    if ($dbconnect->connect_error) {
        die('Server Error');
    }
?>
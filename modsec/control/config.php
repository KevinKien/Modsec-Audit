<?php
$db_host = "localhost";
$db_name    = 'modsec';
$db_username    = 'root'; 
$db_password    = 'kmasecurity';
@mysql_connect("{$db_host}", "{$db_username}", "{$db_password}") or die("Kh�ng th? k?t n?i database");
@mysql_select_db("{$db_name}") or die("Kh�ng th? ch?n database");
?>
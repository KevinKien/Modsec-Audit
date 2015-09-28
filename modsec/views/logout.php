<?php

// tim session
session_start();

// huy cac bien session
$_SESSION = array();

// bo tat ca cookie
if (isset($_COOKIE['session_name'])) {
    setcookie((session_name()), time()-36000, '/',0,0);
}

// huy toan bo session
session_destroy();

// chuyen ve dang login
header('Location: ../login.php');
?>
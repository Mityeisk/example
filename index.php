<?php
if ( $_SERVER["REQUEST_URI"] == '/') $page = 'home';
else {
    $page = substr($_SERVER["REQUEST_URI"],1);
    if(!preg_match('/^[A-z0-9]{3,15}$/', $page)) exit('request error');
}

session_start();

if (file_exists("all/$page.php")) include "all/$page.php";

else if ($_SESSION['ulogin'] == 1 and file_exists("auth/$page.php")) include "auth/$page.php";

else if ($_SESSION['ulogin'] == 1 and file_exists("guest/$page.php")) include "guest/$page.php";

else exit("404 not found");

function top( $title) {
    echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>'.$title.'</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>

';
}

function bottom() {
    echo '</body>
</html>';
}
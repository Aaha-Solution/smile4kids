<?php

$server_name = "localhost";
$db_username = "smile4kids_newS4k";
$db_password = "8wB%YIlB{SQ^";
$db_name = "smile4kids_newS4k";

$connection = mysqli_connect($server_name, $db_username, $db_password, $db_name);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

define("BASE_URL", 'https://smile4kids.co.uk/');

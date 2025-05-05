<?php
session_start();
$_SESSION['classid'] = $_GET['lan'];
include('navbar2.php');
include('courses/Hindi.php');
include('footer.php');

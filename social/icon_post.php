<?php 
session_start();
require '../db.php';

$icon_name = $_POST['icon_name'];
$icon_class = $_POST['icon_class'];
$icon_link = $_POST['icon_link'];

$insert_icon = "INSERT INTO icons(icon_name, class_name, link)VALUES('$icon_name', '$icon_class', '$icon_link')";
$insert_icon_result = mysqli_query($db_connect, $insert_icon);
$_SESSION['icon_added'] = 'Icon Added!';
header('location:add_icon.php');

?>
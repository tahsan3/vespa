<?php 
session_start();
require '../db.php';

$menu_id = $_POST['menu_id'];
$submenu_name = $_POST['submenu_name'];
$submenu_link = $_POST['submenu_link'];

$insert_submenu = "INSERT INTO submenus(menu_id, submenu_name, submenu_links)VALUES($menu_id, '$submenu_name', '$submenu_link')";
$insert_submenu_result = mysqli_query($db_connect, $insert_submenu);
$_SESSION['submenu_added'] = 'Sub Menu Added!';
header('location:add_submenu.php');

?>
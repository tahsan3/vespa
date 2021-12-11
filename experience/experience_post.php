<?php 
session_start();
require '../db.php';

$company_name = $_POST['company_name'];
$duration = $_POST['duration'];
$designation = $_POST['designation'];
$details = $_POST['details'];

$insert_experience = "INSERT INTO experiences(company_name, duration, designation, details)VALUES('$company_name', '$duration', '$designation', '$details')";
$insert_experience_result = mysqli_query($db_connect, $insert_experience);
$_SESSION['experience_added'] = 'experience Added!';
header('location:add_experience.php');

?>
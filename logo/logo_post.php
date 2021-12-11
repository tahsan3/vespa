<?php 
session_start();
require '../db.php';


$logo = $_FILES['logo']['name'];

$uploaded_file = $_FILES['logo'];
$after_explode = explode('.', $uploaded_file['name']);
$exetension = end($after_explode);
$allowed_extension = array('jpg', 'png', 'jpeg', 'gif');
if(in_array($exetension, $allowed_extension)){
    if($uploaded_file['size'] <= 1000000){
        $insert_logo = "INSERT INTO logo(logo)VALUES('$logo')";
        $insert_logo_result = mysqli_query($db_connect, $insert_logo);
        $id = mysqli_insert_id($db_connect);
        $file_name = $id.'.'.$exetension;
        $new_location = '../uploads/logos/'.$file_name;
        move_uploaded_file($uploaded_file['tmp_name'], $new_location);

        $update_image = "UPDATE logo SET logo='$file_name' WHERE id=$id";
        $update_image_result = mysqli_query($db_connect, $update_image);

        $_SESSION['success'] = 'Logo Added Successfully!';
        header('location:add_logo.php');
    }
    else{
        $_SESSION['size'] = 'Maximum File Size 1 MB';
        header('location:add_logo.php');
    }
}
else {
    $_SESSION['invalid_extension'] = 'Image Type Shoud be (jpg, png, gif, jpeg)';
    header('location:add_logo.php');
}


?>
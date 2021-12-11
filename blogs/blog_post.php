<?php 
session_start();
require '../db.php';

$title = $_POST['title'];
$description = mysqli_real_escape_string($db_connect, $_POST['description']);
date_default_timezone_set('Asia/Dhaka');
$created_at = date('y-m-d');



$uploaded_file = $_FILES['image'];
$after_explode = explode('.', $uploaded_file['name']);
$exetension = end($after_explode);
$allowed_extension = array('jpg', 'png', 'jpeg', 'gif');
if (in_array($exetension, $allowed_extension)) {
    if ($uploaded_file['size'] <= 1000000) {

        $insert_blog = "INSERT INTO blogs(title, description, created_at)VALUES('$title', '$description', '$created_at')";
        $insert_blog_result = mysqli_query($db_connect, $insert_blog);

        $id = mysqli_insert_id($db_connect);
        $file_name = $id . '.' . $exetension;
        $new_location = '../uploads/blogs/' . $file_name;
        move_uploaded_file($uploaded_file['tmp_name'], $new_location);

        $update_image = "UPDATE blogs SET image='$file_name' WHERE id=$id";
        $update_image_result = mysqli_query($db_connect, $update_image);

        $_SESSION['success'] = 'Blog Added Successfully!';
        header('location:add_blog.php');

    } else {
        $_SESSION['size'] = 'Maximum File Size 1 MB';
        header('location:add_blog.php');
    }
} else {
    $_SESSION['invalid_extension'] = 'Image Type Shoud be (jpg, png, gif, jpeg)';
    header('location:add_blog.php');
}


?>
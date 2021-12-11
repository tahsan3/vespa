<?php
require '../dashboard_includes/header.php'; 
require '../session_check.php';
require '../db.php';
$id = $_GET['id'];

$select_users = "SELECT * FROM users WHERE id=$id";
$select_users_result = mysqli_query($db_connect, $select_users);
$after_assoc = mysqli_fetch_assoc($select_users_result)

?>
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Dashboard</a>
    </nav>

    <div class="sl-pagebody">
        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="card">
                    <div class="card-header bg-primary text-center">
                        <h3 class="text-white">Users Individual Informations</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>Name:</td>
                                <td><?=$after_assoc['name']?></td>
                            </tr>
                            <tr>
                                <td>email:</td>
                                <td><?=$after_assoc['email']?></td>
                            </tr>
                            <tr>
                                <td>profile photo:</td>
                                <td><img width="200" src="../uploads/users/<?= $after_assoc['profile_photo']?>" alt=""></td>
                            </tr>
                            <tr>
                                <td>Created at:</td>
                                <td><?=$after_assoc['created_at']?></td>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
    require '../dashboard_includes/footer.php';
?>

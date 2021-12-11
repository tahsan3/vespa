<?php 
require '../dashboard_includes/header.php'; 
require '../session_check.php';
?>
<?php 
require '../db.php';

$select_users = "SELECT * FROM users WHERE status=0";
$select_users_result = mysqli_query($db_connect, $select_users);

?>

<!-- ########## START: MAIN PANEL ########## -->
<?php if($_SESSION['role'] != 0){?>
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Dashboard</a>
    </nav>

    <div class="sl-pagebody">
    <div class="row">
        <div class="col-lg-12 m-auto">
            <div class="card">
                <div class="card-header bg-primary text-center">
                    <h3 class="text-white">Users Information</h3>
                </div>
                <?php if(isset($_SESSION['delete_user'])){?>
                <div class="alert alert-success mt-2">
                    <?=$_SESSION['delete_user'];?>
                </div>
                <?php } unset($_SESSION['delete_user'])?>
                <div class="card-body">
                    <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">SL</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Photo</th>
                            <th scope="col">Role</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($select_users_result as $key=>$user){?>
                            <tr>
                                <th scope="row"><?= $key+1?></th>
                                <td><?= $user['name']?></td>
                                <td><?= $user['email']?></td>
                                <td>
                                    <img width="50" src="../uploads/users/<?= $user['profile_photo']?>" alt="">
                                </td>
                                <td>
                                    <?php if($user['role'] == 1){?>
                                        <span class="badge bg-success">Admin</span>
                                    <?php } 
                                    elseif($user['role'] == 2){ ?>
                                        <span class="badge bg-primary">Moderator</span>
                                   <?php }
                                   elseif($user['role'] == 3){ ?>
                                        <span class="badge bg-warning">Viewer</span>
                                   <?php } else{ ?>
                                       <span class="badge bg-secondary">Gorib</span>
                                  <?php } ?>
                                   
                                </td>
                                <td><?= $user['created_at']?></td>
                                <td>
                                    <a href="view.php?id=<?= $user['id']?>" class="btn btn-primary">View</a>

                                    <?php if($_SESSION['role'] !=3 ){?>
                                        <a  href="edit.php?id=<?= $user['id']?>" class="btn btn-info">Edit</a>
                                    <?php } ?>

                                    <?php if($_SESSION['role'] == 1){?>
                                        <a id='soft_delete.php?id=<?= $user['id']?>' class="btn btn-danger delete_btn text-white">Delete</a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->
<?php } ?>
<!-- ########## END: MAIN PANEL ########## -->
<?php require '../dashboard_includes/footer.php'; ?>
<script>
    $('.delete_btn').click(function(){
        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.isConfirmed) {
            window.location.href=$(this).attr('id');
        }
        })
    });
</script>
<?php if(isset($_SESSION['soft_del'])){?>
    <script>
        Swal.fire(
        'Deleted!',
        'Your file has been deleted.',
        'success'
        )
    </script>
<?php } unset($_SESSION['soft_del'])?>


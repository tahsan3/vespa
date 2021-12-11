<?php
require '../dashboard_includes/header.php';
require '../session_check.php';
?>
<?php
require '../db.php';

$select_projects = "SELECT * FROM projects";
$select_projects_result = mysqli_query($db_connect, $select_projects);

?>

<!-- ########## START: MAIN PANEL ########## -->
<?php if ($_SESSION['role'] != 0) { ?>
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html">Dashboard</a>
        </nav>

        <div class="sl-pagebody">
            <div class="row">
                <div class="col-lg-12 m-auto">
                    <div class="card">
                        <div class="card-header bg-primary text-center">
                            <h3 class="text-white">Projects Information</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Client</th>
                                        <th scope="col">Completion</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Author</th>
                                        <th scope="col">Budget</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($select_projects_result as $key => $project) { ?>
                                        <tr>
                                            <td scope="row"><?= $key + 1 ?></th>
                                            <td><?= $project['title'] ?></td>
                                            <td><?= $project['category'] ?></td>
                                            <td><?= $project['client'] ?></td>
                                            <td><?= $project['completion'] ?></td>
                                            <td><?= $project['type'] ?></td>
                                            <td><?= $project['author'] ?></td>
                                            <td><?= $project['budget'] ?></td>
                                            <td>
                                                <img width="50" src="../uploads/projects/<?= $project['image'] ?>" alt="">
                                            </td>
                                            <td>
                                                <a href="banner_edit.php?id=<?= $banner['id'] ?>" class="btn btn-info">Edit</a>

                                                <a id='soft_delete.php?id=<?= $banner['id'] ?>' class="btn btn-danger delete_btn text-white">Delete</a>
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
    $('.delete_btn').click(function() {
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
                window.location.href = $(this).attr('id');
            }
        })
    });
</script>
<?php if (isset($_SESSION['soft_del'])) { ?>
    <script>
        Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
        )
    </script>
<?php }
unset($_SESSION['soft_del']) ?>
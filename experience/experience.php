<?php
require '../dashboard_includes/header.php';
require '../session_check.php';
?>
<?php
require '../db.php';

$select_experience = "SELECT * FROM experiences";
$select_experience_result = mysqli_query($db_connect, $select_experience);

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
                            <h3 class="text-white">Experience Information</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">Company Name</th>
                                        <th scope="col">Duration</th>
                                        <th scope="col">Designation</th>
                                        <th scope="col">Details</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($select_experience_result as $key => $experience) { ?>
                                        <tr>
                                            <td scope="row"><?= $key + 1 ?></th>
                                            <td><?= $experience['company_name'] ?></td>
                                            <td><?= $experience['duration'] ?></td>
                                            <td><?= $experience['designation'] ?></td>
                                            <td><?= $experience['details'] ?></td>
                                            <td>
                                                <a href="banner_edit.php?id=<?= $experience['id'] ?>" class="btn btn-info">Edit</a>

                                                <a id='soft_delete.php?id=<?= $experience['id'] ?>' class="btn btn-danger delete_btn text-white">Delete</a>
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

<?php if (isset($_SESSION['limit'])) { ?>
    <script>
        Swal.fire({
            icon: 'warning',
            title: 'Sorry',
            text: '<?= $_SESSION['limit'] ?>',
        })
    </script>
<?php }
unset($_SESSION['limit']) ?>
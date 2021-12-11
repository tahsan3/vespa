<?php
require '../dashboard_includes/header.php';
require '../session_check.php';
?>
<?php
require '../db.php';

$select_skills = "SELECT * FROM skills";
$select_skills_result = mysqli_query($db_connect, $select_skills);

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
                            <h3 class="text-white">Skill Information</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">Skill Name</th>
                                        <th scope="col">Percentage</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($select_skills_result as $key => $skill) { ?>
                                        <tr>
                                            <td scope="row"><?= $key + 1 ?></th>
                                            <td><?= $skill['skill_name'] ?></td>
                                            <td><?= $skill['percentage'] ?></td>
                                            <td>
                                                <?php if ($skill['status'] == 1) { ?>
                                                    <a href="skill_status.php?id=<?= $skill['id'] ?>" class="btn btn-success">Active</a>
                                                <?php } else { ?>
                                                    <a href="skill_status.php?id=<?= $skill['id'] ?>" class="btn btn-secondary">Deactive</a>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <a href="banner_edit.php?id=<?= $skill['id'] ?>" class="btn btn-info">Edit</a>

                                                <a id='soft_delete.php?id=<?= $skill['id'] ?>' class="btn btn-danger delete_btn text-white">Delete</a>
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
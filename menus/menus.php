<?php
require '../dashboard_includes/header.php';
require '../session_check.php';
?>
<?php
require '../db.php';

$select_menus = "SELECT * FROM menus";
$select_menus_result = mysqli_query($db_connect, $select_menus);

?>

<!-- ########## START: MAIN PANEL ########## -->
<?php if ($_SESSION['role'] != 0) { ?>
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html">Dashboard</a>
        </nav>

        <div class="sl-pagebody">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="card">
                        <div class="card-header bg-primary text-center">
                            <h3 class="text-white">Menu Information</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">Menu Name</th>
                                        <th scope="col">Menu Link</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($select_menus_result as $key => $menu) { ?>
                                        <tr>
                                            <td scope="row"><?= $key + 1 ?></th>
                                            <td><?= $menu['menu_name'] ?></td>
                                            <td><?= $menu['menu_link'] ?></td>
                                            <td>
                                                <a href="banner_edit.php?id=<?= $menu['id'] ?>" class="btn btn-info">Edit</a>

                                                <a id='soft_delete.php?id=<?= $menu['id'] ?>' class="btn btn-danger delete_btn text-white">Delete</a>
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
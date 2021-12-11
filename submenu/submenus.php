<?php
require '../dashboard_includes/header.php';
require '../session_check.php';
?>
<?php
require '../db.php';

$select_submenus = "SELECT * FROM submenus";
$select_submenus_result = mysqli_query($db_connect, $select_submenus);

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
                                        <th scope="col">SubMenu Name</th>
                                        <th scope="col">Sub Menu Link</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($select_submenus_result as $key => $submenu) { $id=$submenu['menu_id']?>
                                        <tr>
                                            <td scope="row"><?= $key + 1 ?></th>
                                            <td>
                                                <?php 
                                                    $select_menu = "SELECT * FROM menus WHERE id=$id";
                                                    $select_menu_result = mysqli_query($db_connect, $select_menu);
                                                    $after_assoc = mysqli_fetch_assoc($select_menu_result);
                                                    echo $after_assoc['menu_name'];
                                                ?>
                                            </td>
                                            <td><?= $submenu['submenu_name'] ?></td>
                                            <td><?= $submenu['submenu_links'] ?></td>
                                            <td>
                                                <a href="banner_edit.php?id=<?= $submenu['id'] ?>" class="btn btn-info">Edit</a>

                                                <a id='soft_delete.php?id=<?= $submenu['id'] ?>' class="btn btn-danger delete_btn text-white">Delete</a>
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
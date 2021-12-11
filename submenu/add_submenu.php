<?php
require '../dashboard_includes/header.php';
require '../db.php';

$select_menus = "SELECT * FROM menus";
$select_menus_result = mysqli_query($db_connect, $select_menus);
?>

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Dashboard</a>
    </nav>

    <div class="sl-pagebody">
        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h5>Add subMenu</h5>
                    </div>

                    <div class="card-body">
                        <form action="submenu_post.php" method="POST">
                                <div class="form-group">
                                    <select name="menu_id" class="form-control">
                                        <option value="">-- Select Menu --</option>
                                        <?php foreach ($select_menus_result as $menu) { ?>
                                            <option value="<?= $menu['id'] ?>"><?= $menu['menu_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Sub Menu Name</label>
                                    <input type="text" class="form-control" name="submenu_name">
                                </div>
                                <div class="form-group">
                                    <label for="">Sub Menu Link</label>
                                    <input type="text" class="form-control" name="submenu_link">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Add SubMenu</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require '../dashboard_includes/footer.php';
?>
<?php if (isset($_SESSION['submenu_added'])) { ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Congratlations',
            text: '<?= $_SESSION['submenu_added'] ?>',
        })
    </script>
<?php }
unset($_SESSION['submenu_added']) ?>
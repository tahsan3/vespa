<?php
require '../dashboard_includes/header.php';
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
                        <h5>Add Project</h5>
                    </div>
                    <div class="card-body">
                        <form action="project_post.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="">Project Title</label>
                                <input type="text" class="form-control" name="title">
                            </div>
                            <div class="form-group">
                                <label for="">Category</label>
                                <input class="form-control" name="category">
                            </div>
                            <div class="form-group">
                                <label for="">Client</label>
                                <input type="text" class="form-control" name="client">
                            </div>
                            <div class="form-group">
                                <label for="">COMPLETION</label>
                                <input type="date" class="form-control" name="completion">
                            </div>
                            <div class="form-group">
                                <label for="">PROJECT TYPE</label>
                                <input type="text" class="form-control" name="type">
                            </div>
                            <div class="form-group">
                                <label for="">AUTHORS</label>
                                <input type="text" class="form-control" name="author">
                            </div>
                            <div class="form-group">
                                <label for="">BUDGET</label>
                                <input type="text" class="form-control" name="budget">
                            </div>
                            <div class="form-group">
                                <label for="">Project Image</label>
                                <input type="file" class="form-control" name="image">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Add Banner</button>
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
<?php if (isset($_SESSION['invalid_extension'])) { ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '<?= $_SESSION['invalid_extension'] ?>',
        })
    </script>
<?php }
unset($_SESSION['invalid_extension']) ?>

<?php if (isset($_SESSION['size'])) { ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '<?= $_SESSION['size'] ?>',
        })
    </script>
<?php }
unset($_SESSION['size']) ?>

<?php if (isset($_SESSION['success'])) { ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Congratulations',
            text: '<?= $_SESSION['success'] ?>',
        })
    </script>
<?php }
unset($_SESSION['success']) ?>
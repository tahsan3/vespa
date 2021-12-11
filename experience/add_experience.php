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
                        <h5>Add Experience</h5>
                    </div>

                    <div class="card-body">
                        <form action="experience_post.php" method="POST">
                            <div class="form-group">
                                <label for="">Company Name</label>
                                <input type="text" class="form-control" name="company_name">
                            </div>
                            <div class="form-group">
                                <label for="">Duration</label>
                                <input type="text" class="form-control" name="duration">
                            </div>
                            <div class="form-group">
                                <label for="">Designation</label>
                                <input type="text" class="form-control" name="designation">
                            </div>
                            <div class="form-group">
                                <label for="">Details</label>
                                <textarea name="details" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Add Skill</button>
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
<?php if (isset($_SESSION['experience_added'])) { ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Congratlations',
            text: '<?= $_SESSION['experience_added'] ?>',
        })
    </script>
<?php }
unset($_SESSION['experience_added']) ?>
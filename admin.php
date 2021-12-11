<?php
require 'db.php';
require 'dashboard_includes/header.php'; 
?>

<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Dashboard</a>
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h1>Welcome To Vespa Admin Panel</h1>
        </div><!-- sl-page-title -->

      </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
<?php require 'dashboard_includes/footer.php'; ?>

<?php if(isset($_SESSION['login_korche'])){ ?>

    <script>
        Swal.fire({
        position: 'center',
        icon: 'success',
        title: '<?=$_SESSION['login_korche'];?>',
        showConfirmButton: false,
        timer: 1500
        })
    </script>

<?php } unset($_SESSION['login_korche'])?>
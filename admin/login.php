<?php require_once('../config.php') ?>
<!-- Includes the config.php file, which likely contains configuration settings for the app like database connection -->

<!DOCTYPE html>
<html lang="en">

<?php require_once('inc/header.php') ?>
<!-- Includes the header.php file, likely containing metadata, CSS links, and other head elements -->

<body
  style="height: 100%; width: 100%; background: url('<?php echo validate_image($_settings->info('cover')) ?>') center/cover no-repeat;">
  <script>start_loader();</script>
  <!-- Calls a JavaScript function to start a loading animation -->
  <style>
    body,
    #login {
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
    }

    #logo-img {
      height: 120px;
      width: 120px;
      margin-top: 20px;
      margin-bottom: 20px;
      border-radius: 50%;
      object-fit: cover;
    }

    .card {
      width: 100%;
      max-width: 320px;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      background-color: white;
    }

    .login-title {
      font-family: 'Poppins', sans-serif;
      font-size: 1.5rem;
      text-align: center;
      margin-bottom: 1rem;
      color: #333;
    }

    .input-group {
      margin-bottom: 15px;
    }

    .input-group .form-control {
      border-radius: 5px 0 0 5px;
    }

    .input-group .input-group-text {
      border-radius: 0 5px 5px 0;
    }

    .btn {
      width: 50%;
    }

    a {
      font-size: 0.9rem;
      text-decoration: none;
      color: #007bff;
    }
  </style>

  <?php if ($_settings->chk_flashdata('success')): ?>
    <script>
      alert_toast("<?php echo $_settings->flashdata('success') ?>", 'success');
    </script>
  <?php endif; ?>

  <div id="login">
    <img src="<?= validate_image($_settings->info('logo')) ?>" alt="Logo" id="logo-img">
    <!-- Displays the title of the site (admin page), with text-shadow -->
    <h1 class="login-title"><b><?php echo $_settings->info('short_name') ?> - Admin</b></h1>
    <div class="card">
      <!-- Card header with "Login" title -->
      <h4 class="text-center text-navy"><b>Login</b></h4>
      <!-- Login form starts, uses POST method -->
      <form id="login-frm" action="" method="post">
        <div class="input-group">
          <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
          <div class="input-group-append">
            <span class="input-group-text fas fa-user"></span>
          </div>
        </div>
        <div class="input-group">
          <input type="password" class="form-control" name="password" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="d-flex justify-content-between align-items-center">
          <!-- Link to the main website (outside of the admin page) -->
          <a href="<?php echo base_url ?>">Go to Website</a>
          <button type="submit" class="btn btn-primary">Sign In</button>
        </div>
      </form>
    </div>
  </div>

  <!-- External Scripts -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- jQuery script for additional functionality (e.g., form validation, AJAX requests) -->

  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Bootstrap JS for UI components like modals, buttons, and tooltips -->

  <script src="dist/js/adminlte.min.js"></script>
  <!-- AdminLTE custom JS for additional features, likely UI customizations -->

  <script>
    $(document).ready(function () {
      end_loader();
      $('#login-frm').submit(function (e) {
        e.preventDefault();
        var _this = $(this);
        $(".pop-msg").remove();
        var el = $("<div>").addClass("alert pop-msg my-2").hide();
        start_loader();

        $.ajax({
          url: _base_url_ + "classes/Login.php?f=admin_login",
          method: 'POST',
          data: _this.serialize(),
          dataType: 'json',
          error: err => {
            el.text("An error occurred while saving the data").addClass("alert-danger");
            _this.prepend(el.show('slow'));
            end_loader();
          },
          success: function (resp) {
            if (resp.status == 'success') {
              location.href = "./";
            } else {
              el.text(resp.msg || "An error occurred while saving the data").addClass("alert-danger");
              _this.prepend(el.show('slow'));
            }
            end_loader();
          }
        });
      });
    });
  </script>
  <!-- Ends the loading animation when the page finishes loading -->
</body>

</html>
<?php require_once('./config.php') ?>
<!DOCTYPE html>
<html lang="en" style="height: 100%;">

<?php require_once('inc/header.php') ?>

<body
    style="height: 100%; width: 100%; background: url('<?php echo validate_image($_settings->info('cover')) ?>') center/cover no-repeat;">
    <script>start_loader();</script>
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
        <h1 class="login-title"><b><?php echo $_settings->info('short_name') ?> - Student</b></h1>
        <div class="card">
            <h4 class="text-center text-navy"><b>Login</b></h4>
            <form id="slogin-form" action="" method="post">
                <div class="input-group">
                    <input type="email" class="form-control" name="email" placeholder="Email" required autofocus>
                    <div class="input-group-append">
                        <span class="input-group-text fas fa-user"></span>
                    </div>
                </div>
                <div class="input-group">
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span> <!-- Password icon -->
                        </div>

                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <a href="<?php echo base_url ?>">Go to Website</a>
                    <button type="submit" class="btn btn-primary">Sign In</button>
                </div>
            </form>
        </div>
    </div>

    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="dist/js/adminlte.min.js"></script>
    <script src="<?php echo base_url ?>plugins/select2/js/select2.full.min.js"></script>

    <script>
        $(document).ready(function () {
            end_loader();
            $('#slogin-form').submit(function (e) {
                e.preventDefault();
                var _this = $(this);
                $(".pop-msg").remove();
                var el = $("<div>").addClass("alert pop-msg my-2").hide();
                start_loader();

                $.ajax({
                    url: _base_url_ + "classes/Login.php?f=student_login",
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
</body>

</html>
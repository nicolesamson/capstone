<!-- Displays the welcome message with the value of 'name' from the settings object -->
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* General styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        h1 {
            text-align: left;
            font-weight: bold;
            margin: 20px;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            justify-content: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        .col {
            flex: 1 1 calc(25% - 30px);
            /* Adjusts for 4 items per row with spacing */
            max-width: calc(25% - 30px);
            margin: 15px 0;
        }

        .info-box {
            display: flex;
            align-items: center;
            border-radius: 8px;
            background-color: #fff;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
            padding: 15px;
            text-decoration: none;
            color: inherit;
        }

        .info-box:hover {
            transform: translateY(-3px);
            box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.1);
        }

        .info-box-icon {
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 20px;
            color: #fff;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            margin-right: 15px;
        }

        .info-box-content {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .info-box-text {
            font-size: 14px;
            font-weight: bold;
            color: #777;
        }

        .info-box-number {
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }

        /* Color classes */
        .bg-info {
            background: linear-gradient(45deg, #17a2b8, #138496);
        }

        .bg-primary {
            background: linear-gradient(45deg, #007bff, #0056b3);
        }

        .bg-warning {
            background: linear-gradient(45deg, #ffc107, #e0a800);
        }

        .bg-success {
            background: linear-gradient(45deg, #28a745, #218838);
        }

        .bg-dark {
            background: linear-gradient(45deg, #343a40, #23272b);
        }

        .bg-gradient-dark {
            background: linear-gradient(45deg, #23272b, #1c1e21);
        }
    </style>
</head>

<body>
    <h1>Welcome to <img src="<?= validate_image($_settings->info('logo_name')) ?>" id="logo-img"
            style="width: 200px; height: 100%; margin-left: -30px;"></img> </h1>
    <div class="row">
        <!-- Department List -->
        <div class="col">
            <a href="<?php echo base_url ?>admin/?page=departments" class="info-box">
                <span class="info-box-icon bg-info"><i class="fas fa-th-list"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Department List</span>
                    <span class="info-box-number">
                        <?php echo $conn->query("SELECT * FROM department_list WHERE status = 1")->num_rows; ?>
                    </span>
                </div>
            </a>
        </div>

        <!-- Curriculum List -->
        <div class="col">
            <a href="<?php echo base_url ?>admin/?page=curriculum" class="info-box">
                <span class="info-box-icon bg-gradient-dark"><i class="fas fa-scroll"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Curriculum List</span>
                    <span class="info-box-number">
                        <?php echo $conn->query("SELECT * FROM curriculum_list WHERE status = 1")->num_rows; ?>
                    </span>
                </div>
            </a>
        </div>

        <!-- Verified Students -->
        <div class="col">
            <a href="<?php echo base_url ?>admin/?page=students" class="info-box">
                <span class="info-box-icon bg-primary"><i class="fas fa-users"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Verified Students</span>
                    <span class="info-box-number">
                        <?php echo $conn->query("SELECT * FROM student_list WHERE status = 1")->num_rows; ?>
                    </span>
                </div>
            </a>
        </div>

        <!-- Not Verified Students -->
        <div class="col">
            <a href="not_verified_students.php" class="info-box">
                <span class="info-box-icon bg-warning"><i class="fas fa-users"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Not Verified Students</span>
                    <span class="info-box-number">
                        <?php echo $conn->query("SELECT * FROM student_list WHERE status = 0")->num_rows; ?>
                    </span>
                </div>
            </a>
        </div>

        <!-- Verified Archives -->
        <div class="col">
            <a href="<?php echo base_url ?>admin/?page=students" class="info-box">
                <span class="info-box-icon bg-success"><i class="fas fa-archive"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Verified Archives</span>
                    <span class="info-box-number">
                        <?php echo $conn->query("SELECT * FROM archive_list WHERE status = 1")->num_rows; ?>
                    </span>
                </div>
            </a>
        </div>

        <!-- Not Verified Archives -->
        <div class="col">
            <a href="not_verified_archives.php" class="info-box">
                <span class="info-box-icon bg-dark"><i class="fas fa-archive"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Not Verified Archives</span>
                    <span class="info-box-number">
                        <?php echo $conn->query("SELECT * FROM archive_list WHERE status = 0")->num_rows; ?>
                    </span>
                </div>
            </a>
        </div>
    </div>
</body>

</html>
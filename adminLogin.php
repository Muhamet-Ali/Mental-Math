<?php
session_start();
include('conn.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <div class="login-block">
            <form method="POST" action="adminCheck.php">
                <div class="login-block">
                    <h1>Admin Login</h1>
                    <div class="col-12">
                        <input type="text" name="adminName" class="form-control" placeholder="Enter Admin Name"
                            required>
                    </div>
                    <div class="col-12">
                        <input type="password" name="adminPassword" class="form-control"
                            placeholder="Enter Admin Password" required>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php

    ?>
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
        }

        .login-block {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
    </style>
</body>

</html>
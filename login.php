<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- font awesome icon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: url('img/loby.jpg') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            color: #333;
        }

        .login-card .card-header {
            text-align: center;
            font-size: 1.5rem;
            font-weight: bold;
            background: #940707;
            color: #fff;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        .login-card .btn-primary {
            background: #940707;
            border: none;
        }

        .login-card .btn-primary:hover {
            background: #800000;
        }

        .login-card .card-footer a {
            color: #940707;
            text-decoration: none;
        }

        .login-card .card-footer a:hover {
            color: #800000;
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card login-card">
                    <div class="card-header">
                        Login
                    </div>
                    <div class="card-body">
                        <form action="login_process.php" method="POST">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required autofocus>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100"><i class="fa-solid fa-right-to-bracket"></i> Login</button>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <small>Belum punya akun? <a href="register.php">Daftar di sini</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
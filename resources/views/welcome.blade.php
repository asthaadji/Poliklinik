<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Poliklinik</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Custom Styles -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background: white;
            color: white;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card {
            background: rgba(255, 255, 255, 0.1);
            border: none;
            border-radius: 10px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
            padding: 25px;
        }
        .btn-custom {
            font-weight: bold;
            border-radius: 30px;
            text-transform: uppercase;
            transition: all 0.3s;
        }
        .btn-custom:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
        .login-title {
            font-size: 50px;
            font-weight: bold;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container text-center">
        <div class="card p-4">
            <h1 class="login-title">Selamat Datang di Poliklinik</h1>
            <p class="mb-4">Silakan pilih jenis login Anda:</p>
            <div class="d-grid gap-3">
                <!-- Admin Login -->
                <a href="{{ route('admin.login') }}" class="btn btn-primary btn-lg btn-custom">
                    <i class="fas fa-user-shield"></i> Login sebagai Admin
                </a>
                <!-- Dokter Login -->
                <a href="{{ route('dokter.login') }}" class="btn btn-primary btn-lg btn-custom">
                    <i class="fas fa-user-md"></i> Login sebagai Dokter
                </a>
                <!-- Pasien Login -->
                <a href="{{ route('pasien.login') }}" class="btn btn-primary btn-lg btn-custom">
                    <i class="fas fa-user"></i> Login sebagai Pasien
                </a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>

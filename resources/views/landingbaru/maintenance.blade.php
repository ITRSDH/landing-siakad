<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Sedang Maintenance</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f8f9fa;
            min-height:100vh;
        }

        .maintenance-card{
            max-width:650px;
            border:none;
            border-radius:20px;
            box-shadow:0 10px 35px rgba(0,0,0,.08);
        }

        .icon{
            width:90px;
            height:90px;
            border-radius:50%;
            background:#fff3cd;
            color:#d39e00;
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:42px;
            margin:auto;
        }

        .logo{
            width:90px;
            margin-bottom:20px;
        }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center" style="min-height:100vh;">

    <div class="card maintenance-card p-5 text-center">

        <!-- Logo -->
        <!-- Ganti sesuai logo kampus -->
        <img src="logo.png" class="logo mx-auto" alt="Logo">

        <div class="icon mb-4">
            🛠️
        </div>

        <h2 class="fw-bold mb-3">
            Website Sedang Dalam Pemeliharaan
        </h2>

        <p class="text-secondary fs-5">
            Mohon maaf atas ketidaknyamanannya.
            Saat ini kami sedang melakukan pembaruan sistem untuk meningkatkan kualitas layanan.
        </p>

        <hr>

        <p class="mb-2">
            Silakan kembali beberapa saat lagi.
        </p>

        <div class="text-muted small">
            © 2026 STIKES Dian Husada Mojokerto
        </div>

    </div>

</div>

</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel App</title>

    <!-- Link untuk Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        /* Gaya umum untuk body dan container */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        nav {
            background-color: #007bff;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        nav a {
            color: #fff;
            text-decoration: none;
            margin: 0 15px;
            transition: color 0.3s;
            font-weight: 500;
        }

        nav a:hover {
            color: #ffdd57;
        }

        .container {
            max-width: 900px;
            margin: 40px auto;
            padding: 20px;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            flex: 1; /* Membuat container mengisi ruang yang tersisa */
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        /* Gaya untuk heading */
        h2 {
            font-size: 28px;
            color: #333;
            margin-bottom: 15px;
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
        }

        /* Gaya untuk paragraf */
        p {
            font-size: 18px;
            color: #555;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        /* Gaya tombol */
        .btn {
            display: inline-block;
            font-size: 16px;
            font-weight: 600;
            color: #fff;
            background-color: #007bff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        /* Gaya untuk tombol tambah */
        .btn-add {
            position: fixed;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 60px;
            background-color: #ff5e62;
            background: linear-gradient(45deg, #ff5e62, #ff9966);
            color: white;
            border: none;
            border-radius: 50%;
            font-size: 24px;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            display: flex;
            justify-content: center;
            align-items: center;
            transition: background 0.3s ease, box-shadow 0.3s ease;
            z-index: 1000;
        }

        .btn-add:hover {
            background: linear-gradient(45deg, #ff9966, #ff5e62);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }

        .btn-add i {
            font-size: 28px;
        }

        /* Gaya untuk footer */
        footer {
            text-align: center;
            padding: 15px;
            background-color: #007bff;
            color: white;
            position: relative;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <nav>
        <div>
            @guest
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endguest
            @auth
                <a href="{{ route('profile') }}" class="profile-link">
                    <i class="fas fa-user-circle"></i> Profil
                </a>
            @endauth
        </div>
        @auth
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        @endauth
    </nav>

    <div class="container">
        @yield('content')
    </div>
    <!-- Tombol tambah dengan ikon + di bagian bawah -->

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>

    <!-- Font: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
        }

        body {
            display: flex;
            min-height: 100vh;
            background-color: #eaf4fb;
            font-size: 13px;
        }

        .sidebar {
            width: 220px;
            background-color: #c8d7df; /* Lebih terang dan tidak bentrok dengan warna teks */
            color: #0a3558;
            padding: 16px;
            display: flex;
            flex-direction: column;
            position: sticky;
            top: 0;
            height: 100vh;
            box-shadow: 2px 0 6px rgba(0, 0, 0, 0.04);
        }



        .sidebar h2 {
            background-color: #b1d2ec;
            color: #0a3558;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 8px;
            text-align: center;
            font-size: 15px;
            font-weight: 600;
        }

        .menu-group {
            margin-bottom: 20px;
        }

        .menu-group h4 {
            font-size: 11px;
            margin-bottom: 8px;
            color: #1c5d99;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        .menu-group a {
            color: #0a3558;
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 6px 8px;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s, color 0.3s;
            font-size: 13px;
        }

        .menu-group a:hover {
            background-color: #e1f0fb;
            color: #1565c0;
        }

        .menu-group a.active {
            background-color: #e1f0fb;
            font-weight: 600;
            color: #1565c0;
        }

        .logout {
            margin-top: auto;
        }

        .logout button {
            background: none;
            color: #0a3558;
            border: none;
            cursor: pointer;
            padding: 8px;
            width: 100%;
            text-align: left;
            font-size: 13px;
            font-family: inherit;
            transition: background 0.3s, color 0.3s;
            border-radius: 5px;
        }

        .logout button:hover {
            background-color: #e1f0fb;
            color: #1565c0;
        }

        .content {
            flex: 1;
            padding: 20px;
            background-color: #f8fcff;
            font-size: 13px;
        }

        @media (max-width: 768px) {
            body {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .content {
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>SMK TARUNA BHAKTI</h2>

        <div class="menu-group">
            <h4>Administrator</h4>
            <a href="{{ route('admin.dashboard') }}">🏠 Dashboard</a>
        </div>

        <div class="menu-group">
            <h4>Data Utama</h4>
            <a href="{{ route('admin.kategori.index') }}">📁 Kategori Barang</a>
            <a href="{{ route('admin.barang.index') }}">📦 Data Barang</a>
        </div>

        <div class="menu-group">
            <h4>Data User</h4>
            <a href="{{ route('admin.user.index') }}">👤 Tambah User</a>
        </div>

        <div class="menu-group">
            <h4>Transaksi</h4>
            <a href="{{ route('admin.peminjaman.index') }}">📝 Peminjaman Barang</a>
            <a href="{{ route('admin.pengembalian.index') }}">📋 Pengembalian Barang</a>
        </div>

        <div class="menu-group">
            <h4>Laporan</h4>
            <a href="{{ route('admin.laporan.index') }}">📈 Data Laporan </a>
        </div>

        <div class="logout">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                @method('DELETE')
                <button type="submit">🚪 Logout</button>
            </form>
        </div>
    </div>

    <div class="content">
        @yield('content')
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login - Sistem SAPRAS</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body class="min-h-screen bg-gray-100 flex items-center justify-center font-sans text-gray-800">

  <div class="w-full max-w-6xl bg-white shadow-2xl rounded-2xl overflow-hidden flex flex-col md:flex-row">
    
    <!-- Form Section -->
    <div class="w-full md:w-1/2 p-10 flex flex-col justify-center">
      <div class="flex items-center gap-3 mb-8">
        <div class="w-12 h-12 bg-blue-800 text-white rounded-lg flex items-center justify-center text-xl shadow-md">
          <i class="fas fa-tools"></i>
        </div>
        <h2 class="text-blue-800 text-2xl font-bold">Sistem SAPRAS</h2>
      </div>

      <h1 class="text-3xl font-bold mb-2">Masuk ke Sistem</h1>
      <p class="text-gray-500 text-sm mb-6">Gunakan akun SAPRAS untuk masuk</p>

      <form method="POST" action="{{ route('auth.login.submit') }}">
        @csrf
        <div class="mb-4 relative">
          <i class="fas fa-user-tie absolute top-3 left-3 text-gray-400"></i>
          <input type="text" name="name" class="pl-10 pr-4 py-3 w-full border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" placeholder="Username" required autofocus>
          @error('name')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-4 relative">
          <i class="fas fa-lock absolute top-3 left-3 text-gray-400"></i>
          <input type="password" name="password" class="pl-10 pr-4 py-3 w-full border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" placeholder="Password" required>
          @error('password')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>

        <div class="flex items-center justify-between text-sm mb-6">
          <label class="flex items-center gap-2">
            <input type="checkbox" class="form-checkbox text-blue-600" name="remember">
            <span class="text-gray-600">Ingat saya</span>
          </label>
          <a href="#" class="text-blue-600 hover:underline">Lupa password?</a>
        </div>

        <button type="submit" class="w-full bg-blue-800 text-white py-3 rounded-lg hover:bg-blue-700 transition shadow-md">
          Masuk
        </button>
      </form>
    </div>

    <!-- Welcome Section -->
    <div class="w-full md:w-1/2 bg-gradient-to-br from-blue-800 to-blue-600 p-10 flex flex-col justify-center items-center text-white relative overflow-hidden">
      <!-- Background Circle -->
      <div class="absolute top-[-60px] right-[-60px] w-[220px] h-[220px] bg-white bg-opacity-10 rounded-full"></div>

      <!-- Gambar SAPRAS -->
      <img src="/assets/sarpras2.png" alt="SAPRAS" class="w-60 mb-6 drop-shadow-xl z-10">

      <!-- Judul -->
      <h2 class="text-2xl md:text-3xl font-semibold mb-4 relative z-10 text-center">Manajemen Sarana & Prasarana</h2>

      <!-- Fitur -->
      <ul class="text-sm space-y-4 relative z-10">
        <li class="flex items-center gap-3">
          <div class="w-6 h-6 bg-black bg-opacity-20 rounded-full flex items-center justify-center text-xs">
            <i class="fas fa-check"></i>
          </div>
          Kelola inventaris barang
        </li>
        <li class="flex items-center gap-3">
          <div class="w-6 h-6 bg-black bg-opacity-20 rounded-full flex items-center justify-center text-xs">
            <i class="fas fa-check"></i>
          </div>
          Pantau peminjaman alat
        </li>
        <li class="flex items-center gap-3">
          <div class="w-6 h-6 bg-black bg-opacity-20 rounded-full flex items-center justify-center text-xs">
            <i class="fas fa-check"></i>
          </div>
          Laporan terintegrasi
        </li>
      </ul>
    </div>
  </div>

</body>
</html>

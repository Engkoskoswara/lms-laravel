<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portofolio Guru 📚</title>
    <!-- CDN Tailwind CSS untuk kemudahan awal -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans flex flex-col min-h-screen">

    <!-- 🧭 Navigation Bar -->
    <nav class="bg-indigo-600 text-white shadow-md">
        <div class="max-w-6xl mx-auto px-4 py-4 flex justify-between items-center">
            <a href="/" class="text-xl font-bold tracking-wide">👨‍🏫 Portofolio Guru</a>
            <div class="space-x-6 font-medium">
                <a href="/" class="hover:text-indigo-200 transition">Beranda</a>
                <a href="/tentang" class="hover:text-indigo-200 transition">Tentang Saya</a>
                <a href="/portofolio" class="hover:text-indigo-200 transition">Portofolio</a>
                <a href="/tasks" class="hover:text-indigo-200 transition">Tugas Saya</a>
            </div>
        </div>
    </nav>

    <!-- 📌 Area Konten Utama (Dinamis) -->
    <main class="flex-grow max-w-6xl w-full mx-auto px-4 py-8">
        @yield('content')
    </main>

    <!-- 🦶 Footer -->
    <footer class="bg-gray-800 text-gray-400 py-6 text-center text-sm">
        <p>&copy; {{ date('Y') }} Portofolio Guru. Dibuat dengan Laravel & Tailwind CSS.</p>
    </footer>

</body>
</html>
@extends('layouts.app')

@section('content')
    <div class="bg-white rounded-lg shadow-md p-8">
        <h1 class="text-3xl font-bold text-indigo-600 mb-4">Portofolio & Karya 🏆</h1>
        <p class="text-gray-600 mb-6">Berikut adalah beberapa proyek pembelajaran dan karya yang telah saya kembangkan:</p>

        <!-- Contoh Card Karya -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="border rounded-lg p-5 shadow-sm hover:shadow-md transition">
                <h3 class="text-xl font-bold text-gray-800 mb-2">Modul Pembelajaran Interaktif 📚</h3>
                <p class="text-gray-600 text-sm">Modul digital berbasis proyek untuk meningkatkan keterlibatan siswa di kelas.</p>
            </div>
            <div class="border rounded-lg p-5 shadow-sm hover:shadow-md transition">
                <h3 class="text-xl font-bold text-gray-800 mb-2">Media Pembelajaran Berbasis Game 🎮</h3>
                <p class="text-gray-600 text-sm">Kuis dan permainan edukatif untuk menguji pemahaman konsep dasar.</p>
            </div>
        </div>
    </div>
@endsection
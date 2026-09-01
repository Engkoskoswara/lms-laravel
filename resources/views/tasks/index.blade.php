@extends('layouts.app')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    
    <!-- 📝 Formulir Tambah Tugas Baru -->
    <div class="bg-white p-6 rounded-lg shadow-md h-fit">
        <h2 class="text-xl font-bold text-gray-800 mb-4">Tambah Tugas Baru ➕</h2>

        <!-- Notifikasi Sukses -->
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
            
            <!-- Judul Tugas -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-1">Judul Tugas</label>
                <input type="text" name="title" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Contoh: Matematika Bab 3" required>
            </div>

            <!-- Deskripsi -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-1">Deskripsi Tugas</label>
                <textarea name="description" rows="3" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Jelaskan instruksi tugas..." required></textarea>
            </div>

            <!-- Tenggat Waktu -->
            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-1">Tenggat Waktu (Due Date)</label>
                <input type="datetime-local" name="due_date" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
            </div>

            <button type="submit" class="w-full bg-indigo-600 text-white font-semibold py-2 rounded hover:bg-indigo-700 transition">
                Simpan Tugas 🚀
            </button>
        </form>
    </div>

    <!-- 📋 Daftar Tugas Siswa -->
    <div class="md:col-span-2 bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-bold text-gray-800 mb-4">Daftar Tugas Siswa 📚</h2>

        @if($tasks->isEmpty())
            <p class="text-gray-500 text-center py-8">Belum ada tugas yang dibuat. Silakan tambahkan tugas melalui formulir!</p>
        @else
            <div class="space-y-4">
                @foreach($tasks as $task)
                    <div class="border rounded-lg p-4 hover:shadow-md transition">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="text-lg font-bold text-indigo-600">{{ $task->title }}</h3>
                            <span class="text-xs bg-red-100 text-red-600 font-semibold px-2 py-1 rounded">
                                ⏰ {{ \Carbon\Carbon::parse($task->due_date)->format('d M Y, H:i') }}
                            </span>
                        </div>
                        <p class="text-gray-600 text-sm mb-3">{{ $task->description }}</p>
                        
                        <!-- ✏️ Bagian Bawah Kartu (Status Nilai, Tombol Edit & Tombol Hapus) -->
                        <div class="text-xs text-gray-500 border-t pt-2 flex justify-between items-center">
                            <span>Dibuat: {{ $task->created_at->diffForHumans() }}</span>
                            <div class="flex items-center gap-2">
                                <span class="font-semibold text-gray-700 mr-1">
                                    Nilai: {{ $task->score !== null ? $task->score : 'Belum Dinilai' }} 💯
                                </span>
                                <!-- 🟡 Tombol Edit/Nilai -->
                                <a href="{{ route('tasks.edit', $task->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded text-xs hover:bg-yellow-600 transition">
                                    ✏️ Edit / Nilai
                                </a>

                                <!-- 🔴 Tombol Hapus -->
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Apakah kamu yakin ingin menghapus tugas ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded text-xs hover:bg-red-600 transition">
                                        🗑️ Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

</div>
@endsection
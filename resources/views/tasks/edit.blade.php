@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Edit Tugas & Input Nilai ✏️</h2>

    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Judul Tugas -->
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1">Judul Tugas</label>
            <input type="text" name="title" value="{{ $task->title }}" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
        </div>

        <!-- Deskripsi -->
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1">Deskripsi Tugas</label>
            <textarea name="description" rows="3" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" required>{{ $task->description }}</textarea>
        </div>

        <!-- Tenggat Waktu -->
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1">Tenggat Waktu (Due Date)</label>
            <input type="datetime-local" name="due_date" value="{{ \Carbon\Carbon::parse($task->due_date)->format('Y-m-d\TH:i') }}" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
        </div>

        <!-- Input Nilai -->
        <div class="mb-6">
            <label class="block text-gray-700 font-medium mb-1">Nilai Siswa (0 - 100) 💯</label>
            <input type="number" name="score" value="{{ $task->score }}" min="0" max="100" placeholder="Masukkan nilai..." class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>

        <div class="flex justify-between items-center">
            <a href="{{ route('tasks.index') }}" class="text-gray-600 hover:underline">⬅️ Batal</a>
            <button type="submit" class="bg-indigo-600 text-white font-semibold px-4 py-2 rounded hover:bg-indigo-700 transition">
                Simpan Perubahan 💾
            </button>
        </div>
    </form>
</div>
@endsection
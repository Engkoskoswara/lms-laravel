<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // 1. Menampilkan halaman daftar tugas
    public function index()
    {
        $tasks = Task::latest()->get(); // Mengambil semua tugas terbaru
        return view('tasks.index', compact('tasks'));
    }

    // 2. Menyimpan tugas baru ke SQLite
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'title'       => 'required|max:255',
            'description' => 'required',
            'due_date'    => 'required|date',
        ]);

        // Simpan data
        Task::create([
            'title'       => $request->title,
            'description' => $request->description,
            'due_date'    => $request->due_date,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Tugas berhasil ditambahkan!');
    }

    // 3. Menampilkan halaman form edit tugas ✏️
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    // 4. Menyimpan perubahan data tugas & nilai ke database 💾
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title'       => 'required|max:255',
            'description' => 'required',
            'due_date'    => 'required|date',
            'score'       => 'nullable|numeric|min:0|max:100', // Nilai opsional (0-100)
        ]);

        $task->update([
            'title'       => $request->title,
            'description' => $request->description,
            'due_date'    => $request->due_date,
            'score'       => $request->score,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Tugas dan nilai berhasil diperbarui!');
    }
    // 5. Menghapus tugas dari database 🗑️
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Tugas berhasil dihapus!');
    }
}
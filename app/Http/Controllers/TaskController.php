<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function index()
    {
        // Ambil tasks milik user login, urutkan: urgent desc, important desc, deadline asc (NULL di bawah)
        $tasks = auth()->user()->tasks()
            ->orderBy('urgent', 'desc')
            ->orderBy('important', 'desc')
            ->orderByRaw('deadline IS NULL')
            ->orderBy('deadline', 'asc')
            ->get();

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(TaskRequest $request)
    {
        // Transaksi database: semua sukses atau semua dibatalkan
        DB::beginTransaction();
        
        try {
            // Simpan task (user_id terisi otomatis lewat relasi)
            $task = auth()->user()->tasks()->create([
                'title' => $request->title,
                'description' => $request->description,
                'deadline' => $request->deadline,
                'urgent' => $request->input('urgent', 0),
                'important' => $request->input('important', 0),
                'harada_goal' => $request->harada_goal,
            ]);

            // Simpan subtasks jika ada
            if ($request->has('subtasks')) {
                foreach ($request->subtasks as $subtaskData) {
                    if (!empty($subtaskData['title'])) {
                        $task->subtasks()->create([
                            'title' => $subtaskData['title'],
                            'is_done' => false,
                        ]);
                    }
                }
            }

            // Commit: simpan permanen semua perubahan
            DB::commit();

            return redirect()->route('tasks.index')->with('success', 'Tugas berhasil dibuat');

        } catch (\Throwable $e) {
            // Rollback: batalkan semua perubahan jika ada error
            DB::rollBack();
            
            return back()->withInput()->with('error', 'Gagal menyimpan tugas, coba lagi.');
        }
    }

    public function edit($id)
    {
        // Ambil task milik user login beserta subtasks-nya
        $task = auth()->user()->tasks()->with('subtasks')->findOrFail($id);
        
        return view('tasks.edit', compact('task'));
    }

    public function update(TaskRequest $request, $id)
    {
        // Transaksi database: semua sukses atau semua dibatalkan
        DB::beginTransaction();
        
        try {
            // Ambil task milik user login
            $task = auth()->user()->tasks()->findOrFail($id);
            
            // Update task
            $task->update([
                'title' => $request->title,
                'description' => $request->description,
                'deadline' => $request->deadline,
                'urgent' => $request->input('urgent', 0),
                'important' => $request->input('important', 0),
                'harada_goal' => $request->harada_goal,
            ]);

            // Array ID subtask yang dicentang
            $doneIds = $request->input('done', []);

            // Update is_done subtask lama sesuai centang
            foreach ($task->subtasks as $subtask) {
                $subtask->update([
                    'is_done' => in_array($subtask->id, $doneIds)
                ]);
            }

            // Tambah subtask baru jika ada
            if ($request->has('subtasks')) {
                foreach ($request->subtasks as $subtaskData) {
                    if (!empty($subtaskData['title'])) {
                        $task->subtasks()->create([
                            'title' => $subtaskData['title'],
                            'is_done' => false,
                        ]);
                    }
                }
            }

            // Commit: simpan permanen semua perubahan (trigger akan hitung progress)
            DB::commit();

            return redirect()->route('tasks.index')->with('success', 'Tugas berhasil diperbarui');

        } catch (\Throwable $e) {
            // Rollback: batalkan semua perubahan jika ada error
            DB::rollBack();
            
            return back()->withInput()->with('error', 'Gagal memperbarui tugas, coba lagi.');
        }
    }

    public function destroy($id)
    {
        // Ambil task milik user login
        $task = auth()->user()->tasks()->findOrFail($id);
        
        // Hapus task (subtasks ikut terhapus lewat cascade)
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Tugas berhasil dihapus');
    }
}

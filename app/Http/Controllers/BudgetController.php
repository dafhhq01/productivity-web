<?php

namespace App\Http\Controllers;

use App\Http\Requests\BudgetRequest;
use App\Models\Budget;
use Illuminate\Support\Facades\DB;

class BudgetController extends Controller
{
    public function index()
    {
        $bulan = request()->input('bulan', now()->month);
        $tahun = request()->input('tahun', now()->year);

        $budgets = auth()->user()->budgets()
            ->where('year', $tahun)
            ->where('month', $bulan)
            ->orderBy('category')
            ->get();

        // Panggil procedure monthly_summary
        $summary = DB::select('CALL monthly_summary(?, ?, ?)', [auth()->id(), $tahun, $bulan]);

        return view('budgets.index', compact('budgets', 'bulan', 'tahun', 'summary'));
    }

    public function create()
    {
        return view('budgets.create');
    }

    public function store(BudgetRequest $request)
    {
        try {
            auth()->user()->budgets()->create($request->validated());
            return redirect()->route('budgets.index')->with('success', 'Budget berhasil ditambahkan');
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() === '23000') {
                return back()->withInput()->with('error', 'Budget kategori ini sudah ada di bulan tersebut');
            }
            throw $e;
        }
    }

    public function edit(Budget $budget)
    {
        auth()->user()->budgets()->findOrFail($budget->id);
        return view('budgets.edit', compact('budget'));
    }

    public function update(BudgetRequest $request, Budget $budget)
    {
        try {
            auth()->user()->budgets()->findOrFail($budget->id)->update($request->validated());
            return redirect()->route('budgets.index')->with('success', 'Budget berhasil diperbarui');
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() === '23000') {
                return back()->withInput()->with('error', 'Budget kategori ini sudah ada di bulan tersebut');
            }
            throw $e;
        }
    }

    public function destroy(Budget $budget)
    {
        try {
            auth()->user()->budgets()->findOrFail($budget->id)->delete();
            return redirect()->route('budgets.index')->with('success', 'Budget berhasil dihapus');
        } catch (\Throwable $e) {
            return back()->with('error', 'Gagal menghapus budget');
        }
    }
}

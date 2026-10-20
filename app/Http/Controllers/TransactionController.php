<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;

class TransactionController extends Controller
{
    public function index()
    {
        $bulan = request()->input('bulan', now()->month);
        $tahun = request()->input('tahun', now()->year);

        $transactions = auth()->user()->transactions()
            ->whereMonth('transaction_date', $bulan)
            ->whereYear('transaction_date', $tahun)
            ->orderBy('transaction_date', 'desc')
            ->get();

        $totalIncome = auth()->user()->transactions()
            ->where('type', 'income')
            ->whereMonth('transaction_date', $bulan)
            ->whereYear('transaction_date', $tahun)
            ->sum('amount');

        $totalExpense = auth()->user()->transactions()
            ->where('type', 'expense')
            ->whereMonth('transaction_date', $bulan)
            ->whereYear('transaction_date', $tahun)
            ->sum('amount');

        $selisih = $totalIncome - $totalExpense;

        // Find nearest month with transactions if current month is empty
        $nearestMonth = null;
        if ($transactions->isEmpty()) {
            $nearest = auth()->user()->transactions()
                ->selectRaw('MONTH(transaction_date) as month, YEAR(transaction_date) as year, COUNT(*) as count')
                ->groupBy('month', 'year')
                ->orderByRaw('ABS(TIMESTAMPDIFF(MONTH, transaction_date, ?)) ASC', [now()->format('Y-m-01')])
                ->first();
            
            if ($nearest) {
                $nearestMonth = [
                    'month' => $nearest->month,
                    'year' => $nearest->year,
                    'count' => $nearest->count
                ];
            }
        }

        return view('transactions.index', compact('transactions', 'bulan', 'tahun', 'totalIncome', 'totalExpense', 'selisih', 'nearestMonth'));
    }

    public function create()
    {
        return view('transactions.create');
    }

    public function store(TransactionRequest $request)
    {
        auth()->user()->transactions()->create($request->validated());
        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil ditambahkan');
    }

    public function edit($id)
    {
        $transaction = auth()->user()->transactions()->findOrFail($id);
        return view('transactions.edit', compact('transaction'));
    }

    public function update(TransactionRequest $request, $id)
    {
        $transaction = auth()->user()->transactions()->findOrFail($id);
        $transaction->update($request->validated());
        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil diperbarui');
    }

    public function destroy($id)
    {
        try {
            $transaction = auth()->user()->transactions()->findOrFail($id);
            $transaction->delete();
            return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil dihapus');
        } catch (\Throwable $e) {
            return back()->with('error', 'Gagal menghapus transaksi');
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

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

        return view('transactions.index', compact('transactions', 'bulan', 'tahun', 'totalIncome', 'totalExpense', 'selisih'));
    }

    public function create()
    {
        return view('transactions.create');
    }

    public function store(TransactionRequest $request)
    {
        try {
            DB::beginTransaction();

            auth()->user()->transactions()->create($request->validated());

            DB::commit();
            return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil ditambahkan');
        } catch (\Throwable $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal menambahkan transaksi');
        }
    }

    public function edit(Transaction $transaction)
    {
        auth()->user()->transactions()->findOrFail($transaction->id);
        return view('transactions.edit', compact('transaction'));
    }

    public function update(TransactionRequest $request, Transaction $transaction)
    {
        try {
            DB::beginTransaction();

            auth()->user()->transactions()->findOrFail($transaction->id)->update($request->validated());

            DB::commit();
            return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil diperbarui');
        } catch (\Throwable $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal memperbarui transaksi');
        }
    }

    public function destroy(Transaction $transaction)
    {
        try {
            auth()->user()->transactions()->findOrFail($transaction->id)->delete();
            return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil dihapus');
        } catch (\Throwable $e) {
            return back()->with('error', 'Gagal menghapus transaksi');
        }
    }
}

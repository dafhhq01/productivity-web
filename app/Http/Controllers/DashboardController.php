<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        // Jumlah tugas belum selesai (progress < 100)
        $tasksBelumSelesai = auth()->user()->tasks()->where('progress', '<', 100)->count();

        // Total pemasukan bulan ini
        $totalIncome = auth()->user()->transactions()
            ->where('type', 'income')
            ->whereMonth('transaction_date', now()->month)
            ->whereYear('transaction_date', now()->year)
            ->sum('amount');

        // Total pengeluaran bulan ini
        $totalExpense = auth()->user()->transactions()
            ->where('type', 'expense')
            ->whereMonth('transaction_date', now()->month)
            ->whereYear('transaction_date', now()->year)
            ->sum('amount');

        // Total modal investasi
        $totalInvestasi = auth()->user()->investments()->sum('amount_invested');

        return view('dashboard', compact('tasksBelumSelesai', 'totalIncome', 'totalExpense', 'totalInvestasi'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Investment;
use App\Http\Requests\InvestmentRequest;
use Illuminate\Database\QueryException;

class InvestmentController extends Controller
{
    public function index()
    {
        $investments = auth()->user()->investments()
            ->selectRaw('investments.*, compound_value(amount_invested, annual_rate, DATEDIFF(CURDATE(), start_date) / 365) as current_value')
            ->get();

        return view('investments.index', compact('investments'));
    }

    public function create()
    {
        return view('investments.create');
    }

    public function store(InvestmentRequest $request)
    {
        auth()->user()->investments()->create($request->validated());

        return redirect()->route('investments.index')->with('success', 'Investasi berhasil ditambahkan');
    }

    public function edit(int $id)
    {
        $investment = auth()->user()->investments()->findOrFail($id);

        return view('investments.edit', compact('investment'));
    }

    public function update(InvestmentRequest $request, int $id)
    {
        $investment = auth()->user()->investments()->findOrFail($id);
        $investment->update($request->validated());

        return redirect()->route('investments.index')->with('success', 'Investasi berhasil diubah');
    }

    public function destroy(int $id)
    {
        try {
            $investment = auth()->user()->investments()->findOrFail($id);
            $investment->delete();

            return redirect()->route('investments.index')->with('success', 'Investasi berhasil dihapus');
        } catch (QueryException $e) {
            if ($e->getCode() === '23000') {
                return back()->with('error', 'Investasi tidak dapat dihapus karena ada relasi data');
            }
            throw $e;
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index() {
        $transactions = Transaction::all();
        $transactionAmountSum = Transaction::query()->sum('amount');
        $transactionCount = Transaction::query()->count();

        return view('transactions/index', compact(
            'transactions',
        'transactionAmountSum',
        'transactionCount'
        ));
    }

    public function create() {
        return view('transactions/create');
    }

    public function store(TransactionRequest $request) {
        Transaction::query()->create($request->all());

        return redirect()->route('transactions.index');
    }

    public function edit(Transaction $transaction) {
        return view('transactions/edit', compact('transaction'));
    }

    public function update(TransactionRequest $request, Transaction $transaction) {
        $transaction->update($request->all());

        return redirect()->route('transactions.index');
    }

    public function destroy(Transaction $transaction) {
        $transaction->delete();

        return back()->with('success', 'Transaction deleted successfully');
    }
}

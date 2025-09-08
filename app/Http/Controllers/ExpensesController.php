<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpensesController extends Controller
{
    // Show all expenses of logged-in user
    public function index(Request $request)
    {
        // Start query for only logged-in user
        $expenses = Expense::where('user_id', Auth::id());

        if ($request->from_date && $request->to_date) {
            $expenses->whereBetween('date', [$request->from_date, $request->to_date]);
        } elseif ($request->from_date) {
            $expenses->whereDate('date', '>=', $request->from_date);
        } elseif ($request->to_date) {
            $expenses->whereDate('date', '<=', $request->to_date);
        }

        if ($request->category) {
            $expenses->where('category', $request->category);
        }

        if ($request->payment) {
            $expenses->where('payment', $request->payment);
        }

        // Get all records after filters
        $expenses = $expenses->get();

        // Calculate total of filtered expenses
        $totalAmount = $expenses->sum('amount');

        return view('expenses.index', compact('expenses', 'totalAmount'));
    }

    // Add new expense
    public function addExpenses(Request $request)
    {
        $expensesData = $request->validate([
            'date' => 'required|date',
            'title' => 'required',
            'category' => 'required',
            'amount' => 'required|numeric',
            'payment' => 'required|in:Cash,Online,Other',
            'notes' => 'nullable|string',
        ]);

        // Logged-in user ID automatically set
        $expensesData['user_id'] = Auth::id();

        Expense::create($expensesData);

        return redirect()->route('expenses.index')
            ->with('success', 'Expense added successfully!');
    }

    // Delete expense
    public function destroy($id)
    {
        $expense = Expense::where('user_id', Auth::id())->findOrFail($id);
        $expense->delete();

        return redirect()->route('expenses.index')->with('success', 'Expense deleted successfully!');
    }



    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required|date',
            'title' => 'required|string|max:255',
            'amount' => 'required|numeric',
        ]);


        $expense = Expense::findOrFail($id);
        $expense->update([
            'date' => $request->date,
            'title' => $request->title,
            'amount' => $request->amount,
        ]);

        return redirect()->route('expenses.index')->with('success', 'Expense updated successfully!');
    }
}

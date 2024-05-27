<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Member;

class BorrowingController extends Controller
{
    public function index(Request $request)
    {
        $query = Borrowing::with(['book', 'member']);

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->whereHas('book', function ($q) use ($search) {
                $q->where('id', $search);
            })->orWhereHas('member', function ($q) use ($search) {
                $q->where('ic_no', $search);
            });
        }

        $borrowings = $query->paginate(20);
        return view('borrowings.index', compact('borrowings'));
    }

    public function create()
    {
        // Fetch all books and members to populate select dropdowns
        $books = Book::all();
        $members = Member::all();
        return view('borrowings.create', compact('books', 'members'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'book_id' => 'required|exists:books,id',
            'member_id' => 'required|exists:members,id',
            'borrow_date' => 'required|date',
            'return_date' => 'nullable|date|after_or_equal:borrow_date'
        ]);

        Borrowing::create($validated);
        return redirect()->route('borrowings.index')->with('success', 'New borrowing record created successfully.');
    }

    public function show(Borrowing $borrowing)
    {
        //
    }

    public function edit(Borrowing $borrowing)
    {
        return view('borrowings.edit', compact('borrowing'));
    }

    public function update(Request $request, Borrowing $borrowing)
    {
        $validated = $request->validate([
            'return_date' => 'required|date|after_or_equal:borrow_date'
        ]);
    
        $borrowing->update($validated);
        return redirect()->route('borrowings.index')->with('success', 'Return date updated successfully.');
    }

    public function destroy(Borrowing $borrowing)
    {
        //
    }
}

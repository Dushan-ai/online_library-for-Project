<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    //
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|string|max:100',
            'price' => 'required|numeric|min:0',
        ]);

        Book::create($validated);

        return redirect()->back()->with('success', 'Book added successfully!');
    }
    public function destroy($id)
    {
        Book::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Book deleted successfully.');
    }
    public function Adminindex()
    {
        $books = Book::all(); // Fetch all books
        return view('admin.dashboard', compact('books'));
    }
    public function index()
    {
        $books = Book::all(); // Fetch all books
        return view('dashboard', compact('books'));
    }
    public function search(Request $request)
    {
        $query = $request->get('query');

        $books = Book::where('title', 'LIKE', "%{$query}%")
                    ->orWhere('description', 'LIKE', "%{$query}%")
                    ->orWhere('type', 'LIKE', "%{$query}%")
                    ->get();

        return response()->json($books);
    }
    public function toggleBorrow(Request $request, $id)
    {
        $borrowed = session()->get('borrowed_books', []);

        if (in_array($id, $borrowed)) {
            // Return the book
            session()->put('borrowed_books', array_diff($borrowed, [$id]));
            return back()->with('status', 'Book returned.');
        } else {
            // Borrow the book
            session()->push('borrowed_books', $id);
            return back()->with('status', 'Book borrowed.');
        }
    }

    public function BorrowedBooks()
    {
        return view('/borrowed');
    }

    public function borrowBook(Request $request, $id)
    {
        $borrowed = session()->get('borrowed', []);

        // Add book ID to session if not already borrowed
        if (!in_array($id, $borrowed)) {
            $borrowed[] = $id;
            session(['borrowed' => $borrowed]);
        }

        return redirect()->back()->with('success', 'Book borrowed successfully!');
    }

    public function returnBook(Request $request, $id)
    {
        $borrowed = session()->get('borrowed', []);

        // Remove the book ID from borrowed list
        if (($key = array_search($id, $borrowed)) !== false) {
            unset($borrowed[$key]);
            session(['borrowed' => $borrowed]);
        }

        return redirect()->back()->with('success', 'Book returned successfully!');
    }

    public function SessionHistory(Request $request)
    {
        $borrowed = session()->get('borrowed', []);
        $books = Book::whereIn('id', $borrowed)->get();

        return view('borrowed', ['books' => $books]);
    }
}

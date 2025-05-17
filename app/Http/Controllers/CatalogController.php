<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function show($id)
    {
        $book = Book::findOrFail($id); // Ambil data buku dari DB berdasarkan ID

        return view('catalog.detail', compact('book')); // Sesuaikan dengan lokasi file blade

        // // Jika ID tidak ditemukan
        // if (!isset($books[$id])) {
        //     abort(404, 'Buku tidak ditemukan');
        // }

        //return view('book-detail', ['book' => $books[$id]]);
    }
    // public function index()
    // {
    //     $books = Book::where('status', 1)->latest()->get();
    //     return view('catalog.index', compact('books'));
    // }

    public function index(Request $request)
    {
    $query = Book::where('status', 1);

        // Filter pencarian
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")->orWhere('author', 'like', "%{$search}%");
            });
        }

        // Filter kategori jika ada
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        $books = $query->latest()->paginate(12); // paginate agar $books->links() berfungsi
        $categories = Category::all();

        return view('catalog.index', compact('books', 'categories'));
    }

    
}


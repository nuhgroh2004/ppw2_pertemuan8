<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Buku;
use App\Http\Resources\BookResource;

class BookApiController extends Controller
{
    public function index()
    {
        $books = Buku::latest()->paginate(5);
        return new BookResource(true, 'List data buku', $books);
    }

    public function show($id)
    {
        $book = Buku::findOrFail($id);
        return new BookResource(true, 'Book found', $book);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'year' => 'required|integer',
        ]);

        $book = Buku::create($validatedData);

        return new BookResource(true, 'Book created successfully', $book);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'year' => 'required|integer',
        ]);

        $book = Buku::findOrFail($id);
        $book->update($validatedData);

        return new BookResource(true, 'Book updated successfully', $book);
    }

    public function destroy($id)
    {
        $book = Buku::findOrFail($id);
        $book->delete();

        return response()->json([
            'status' => true,
            'message' => 'Book deleted successfully',
        ]);
    }
}

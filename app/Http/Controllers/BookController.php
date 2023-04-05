<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\HTTP\Request;

class BookController extends Controller
{
  // Display a listing of the resource.
  function index()
  {
    return response(Book::all(), 200);
  }

  // Store a newly created resource in storage.
  function store(Request $request)
  {
    $data = $request->validate([
      'title' => 'required',
      'authorID' => 'required',
      'abstract' => 'required',
    ]);

    $book = Book::create($data);
  }

  // Display the specified resource.
  function show(Book $book)
  {
    return response($book, 200);
  }

  // Update the specified resource in storage.
  function update(Request $request, Book $book)
  {
    $data = $request->validate([
      'title' => 'required',
      'authorID' => 'required',
      'abstract' => 'required',
    ]);
    
    return response($book->update($data), 200);
  }

  // Remove the specified resource from storage.
  function destroy(Book $book)
  {
    $book->delete('No Book Found', 204);
  }
}

<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorControl extends Controller
{
  // Display a listing of the resource.
  function index()
  {
    return response(Author::all(), 200);
  }

  // Store a newly created resource in storage.
  function store(Request $request)
  {
    $data = $request->validate([
      'name' => 'required',
      'title' => 'required',
      'company' => 'required',
      'email' => 'required',
    ]);

    return response(Author::create($data), 201);
  }

  // Display the specified resource.
  function show(Author $author)
  {
    return response($author, 200);
  }

  // Update the specified resource in storage.
  function update(Request $request, Author $author)
  {
    $data = $request->validate([
      'name' => 'required',
      'title' => 'required',
      'company' => 'required',
      'email' => 'required',
    ]);

    $author->update($data);
    return response($author->update($data), 200);
  }

  // Remove the specified resource from storage.
  function destroy(Author $author)
  {
    $deleteBooks = array_map(fn($book) => $book->delete(), $author->books);
    $deleteBooks($author->books);

    $author->delete();
    return response('No Author Found', 204);
  }
}

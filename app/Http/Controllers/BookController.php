<?php

namespace App\HTTP\Controllers;

use App\Models\Book;
use App\HTTP\Resources\BookResource;
use Illuminate\HTTP\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
  // Display a listing of the resource.
  function index()
  {
    return response(BookResource::collection(Book::all()), 200);
  }

  // Store a newly created resource in storage.
  function store(Request $request)
  {
    $data = Validator::make($request->toArray(), [
      'title' => 'required',
      'authorID' => 'required',
      'abstract' => 'required',
    ]);

    // $book = Book::create($data);
    return response(new BookResource(Book::create($data->validate())), 201);
  }

  // Display the specified resource.
  function show(Book $book)
  {
    return response(new BookResource($book), 200);
  }

  // Update the specified resource in storage.
  function update(Request $request, Book $book)
  {
    $data = Validator::make($request->toArray(), [
      'title' => 'required',
      'authorID' => 'required',
      'abstract' => 'required',
    ]);
    
    // return response($book->update($data), 200);
    $book->update($data->validate());
    return response(new BookResource($book), 201);
  }

  // Remove the specified resource from storage.
  function destroy(Book $book)
  {
    $book->delete('No Content', 204);
  }
}

<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Http\Resources\AuthorResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
  // Display a listing of the resource.
  function index()
  {
    return response(AuthorResource::collection(Author::all(), 200));
  }

  // Store a newly created resource in storage.
  function store(Request $request)
  {
    $data = Validator::make($request->toArray(), [
      'name' => 'required',
      'title' => 'required',
      'company' => 'required',
      'email' => 'required',
    ]);

    return response(new AuthorResource(Author::create($data->validate())), 201);
  }

  // Display the specified resource.
  function show(Author $author)
  {
    return response(new AuthorResource($author), 200);
  }

  // Update the specified resource in storage.
  function update(Request $request, Author $author)
  {
    $data = Validator::make($request->toArray(), [
      'name' => 'required',
      'title' => 'required',
      'company' => 'required',
      'email' => 'required',
    ]);

    $author->update($data->validate());
    return response(new AuthorResource($author), 201);
  }

  // Remove the specified resource from storage.
  function destroy(Author $author)
  {
    $bookList = $author->books;
    $bookList->map(fn($book) => $book->delete());

    $author->delete();
    return response('No Content Found', 204);
  }
}

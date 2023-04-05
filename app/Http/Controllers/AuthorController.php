<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Http\Resources\AuthorResource;
use Illuminate\Http\Request;
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
    $data = $request->validate([
      'name' => 'required',
      'title' => 'required',
      'company' => 'required',
      'email' => 'required',
    ]);

    $author->update($data);
    return response(new AuthorResource($author->update($data)), 200);
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

<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorControl extends Controller
{
  /**
   * Display a listing of the resource.
   */
  function index()
  {
    return response(Author::all(), 200);
  }

  /**
   * Store a newly created resource in storage.
   */
  function store(Request $request)
  {
    $data = $request->validate([]);
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
  }
}

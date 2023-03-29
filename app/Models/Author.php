<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
  protected $table = 'authors';
  // ↳ This code is normally implicit. When a new class is created, a $table variable is also created, then auto-assigned the lowercase/plural version of its class name.

  protected $fillable = ['name', 'title', 'company', 'email'];
  // ↳ $fillable values can be mass-assigned, i.e. seeded simultaneously. Fillable fields can also be modified.

  function books()
  {
    return $this->hasMany(Book::class);
    // return $this->hasMany('App\Models\Book');
  }
  use HasFactory;
}

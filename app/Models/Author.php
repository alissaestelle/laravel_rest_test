<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    // L:11 is usually implicit, but has been written explicitly for this demo.
    protected $table = 'authors';
    protected $fillable = [
        'name',
        'title',
        'company',
        'email'
    ];

    public function books() {
        return $this->hasMany(Book::class);
        // return $this->hasMany('App\Models\Book');
    }
    use HasFactory;
}

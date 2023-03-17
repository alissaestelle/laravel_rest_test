<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    // ↳ This code is normally implicit. When a new class is created, a $table variable is also created, then auto-assigned the lowercase/plural version of its class name.
    
    protected $fillable = [
        'title',
        'author_id',
        'abstract'
    ];
    public function author() {
        return $this->belongsTo(Author::class);
        // return $this->belongsTo('App\Models\Author');
    }
    use HasFactory;
}

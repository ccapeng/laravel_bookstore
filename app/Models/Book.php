<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'category_id', 'publisher_id', 'author_id'
    ];

    public function category(){
        return $this->belongsTo(Category::class, "category_id", "id");
    }

    public function publisher(){
        return $this->belongsTo(Publisher::class, "publisher_id", "id");
    }

    public function author(){
        return $this->belongsTo(Author::class, "author_id", "id");
    }
}

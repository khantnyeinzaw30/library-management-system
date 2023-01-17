<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'author', 'publisher', 'date_published'];

    public function category()
    {
        return $this->morphOne(Category::class, 'categoryable');
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
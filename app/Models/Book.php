<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $guarded = false;
    public $table = 'books';

    public function tags(){
        return $this->belongsToMany(Tag::class, 'tag_books')->withTimestamps();
    }
    public function categories(){
        return $this->belongsToMany(Category::class, 'category_books')->withTimestamps();
    }
    public function uploader(){
        return $this->hasOne(User::class, 'id', 'uploader_id');
    }
    public function pages()
    {
        return $this->hasMany(Page::class);
    }
}

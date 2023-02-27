<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public $guarded = false;

    public function books(){
        return $this->belongsToMany(CategoryBook::class, 'category_books')->withTimestamps();
    }
}

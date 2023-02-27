<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagBook extends Model
{

    use HasFactory;
    public $guarded = false;
    public $table = 'tag_books';
}

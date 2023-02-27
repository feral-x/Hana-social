<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    public $guarded = false;
    public $table = 'tags';

    public function books(){
        return $this->belongsToMany(TagBook::class, 'tag_books')->withTimestamps();
    }
}

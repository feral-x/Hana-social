<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoveBook extends Model
{
    use HasFactory;
    public $guarded = false;

    public function book(){
        return $this->hasOne(Book::class, 'id','book_id');
    }
}

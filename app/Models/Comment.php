<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    public $guarded = false;

    public function get_users()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}

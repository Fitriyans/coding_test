<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'username','password','name', 'role'
    ];

    public function post(){
        return $this->hasMany(Post::class,'username', 'id');
    }
}

<?php

namespace App\Models;

use App\Models\Account;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title','content','date', 'username'
    ];

    public function account(){
        return $this->belongsTo(Account::class,'username','username');
    }
}

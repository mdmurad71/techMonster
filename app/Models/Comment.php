<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function threads(){
        return $this->belongsTo(Thread::class, 'threads_id');
    }

    

    protected $fillable= [
        'comments',
        'threads_id',
        'user_id',
    ];
}

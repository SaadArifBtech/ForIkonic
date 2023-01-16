<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Connection extends Model
{
    use HasFactory;
    protected $table = 'connections';
    protected $fillable = [
        'user_id', 'connected_user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function connected_user()
    {
        return $this->belongsTo(User::class, 'connected_user_id');
    }
}
}

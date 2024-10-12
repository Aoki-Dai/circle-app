<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomEntry extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'user_name',
        'entry_time',
        'exit_time',
    ];

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function getLikesCountAttribute()
    {
        return $this->likes()->count();
    }
}

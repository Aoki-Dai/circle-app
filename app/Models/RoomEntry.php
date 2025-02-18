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

    protected $casts = [
        'entry_time' => 'datetime',
        'exit_time' => 'datetime',
    ];

    protected $withCount = ['likes'];

    // RoomEntryモデルとLikeモデルの1対多のリレーションを定義する
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function isLikedByUser($user_id)
    {
        return $this->likes()->where('user_id', $user_id)->exists();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\RoomEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();
        $roomEntry = RoomEntry::findOrFail($request->room_entry_id);

        // いいねの toggle 処理
        $liked = !$roomEntry->likes()->where('user_id', $user->id)->exists();
        if ($liked) {
            $roomEntry->likes()->create(['user_id' => $user->id]);
        } else {
            $roomEntry->likes()->where('user_id', $user->id)->delete();
        }

        // 最新のいいね情報を取得
        $count = $roomEntry->likes()->count();
        $users = $roomEntry->likes()->with('user')->get()->map(function ($like) {
            return ['name' => $like->user->name];
        });

        return response()->json([
            'success' => true,
            'liked' => $liked,
            'count' => $count,
            'users' => $users
        ]);
    }
}

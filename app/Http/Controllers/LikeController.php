<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function store(Request $request)
    {
        // 既存のいいねを検索
        $like = Like::where('user_id', Auth::id())
            ->where('room_entry_id', $request->room_entry_id)
            ->first();

        if ($like) {
            // 既にいいねしている場合は削除（取り消し）
            $like->delete();
            return response()->json([
                'success' => true,
                'liked' => false,
                'count' => Like::where('room_entry_id', $request->room_entry_id)->count()
            ]);
        }

        // いいねを新規作成
        $like = Like::create([
            'user_id' => Auth::id(),
            'room_entry_id' => $request->room_entry_id,
        ]);

        return response()->json([
            'success' => true,
            'liked' => true,
            'count' => Like::where('room_entry_id', $request->room_entry_id)->count()
        ]);
    }
}

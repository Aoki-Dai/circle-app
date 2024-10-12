<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function store(Request $request)
    {
        $like = Like::create([
            'user_id' => Auth::id(),
            'room_entry_id' => $request->room_entry_id,
        ]);

        return response()->json(['success' => true, 'like' => $like]);
    }
}

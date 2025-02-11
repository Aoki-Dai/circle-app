<?php

namespace App\Http\Controllers;

use App\Models\RoomEntry;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class RoomEntryController extends Controller
{
    public function index()
    {
        $entries = RoomEntry::orderBy('entry_time', 'desc')->get()->map(function ($entry) {
            $entry->entry_time = Carbon::parse($entry->entry_time);
            return $entry;
        });

        return view('room-entries.index', compact('entries'));
    }

    public function create()
    {
        return view('room-entries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            // 'user_id' => 'required|exists:users,id',
            'user_name' => 'required|string|max:255',
            'entry_time' => 'required|date',
            'exit_time' => 'nullable|date'
        ]);

        RoomEntry::create([
            'user_id' => Auth::id(),
            'user_name' => $request->user_name,
            'entry_time' => $request->entry_time,
            'exit_time' => $request->exit_time ?: null // 空文字列の場合はnullを設定
        ]);

        return redirect()->route('room-entries.index');
    }

    public function show(RoomEntry $roomEntry)
    {
        return view('room-entries.show', compact('roomEntry'));
    }

    public function edit(RoomEntry $roomEntry)
    {
        return view('room-entries.edit', compact('roomEntry'));
    }

    public function update(Request $request, RoomEntry $roomEntry)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'user_name' => 'required|string|max:255',
            'entry_time' => 'required|date',
        ]);

        $roomEntry->update($request->all());

        return redirect()->route('room-entries.index');
    }

    public function destroy(RoomEntry $roomEntry)
    {
        $roomEntry->delete();

        return redirect()->route('room-entries.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\RoomEntry;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RoomEntryController extends Controller
{
    public function index()
    {
        $entries = RoomEntry::all()->map(function ($entry) {
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
            'user_id' => 'required|exists:users,id',
            'user_name' => 'required|string|max:255',
            'entry_time' => 'required|date',
        ]);

        RoomEntry::create($request->all());

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

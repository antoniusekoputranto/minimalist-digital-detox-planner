<?php

namespace App\Http\Controllers;

use App\Models\OfflineActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OfflineActivityController extends Controller
{
    public function index()
    {
        $activities = Auth::user()->offlineActivities()->latest()->get();
        return view('offline_activities.index', compact('activities'));
    }

    public function create()
    {
        return view('offline_activities.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'activity_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'scheduled_at' => 'required|date',
        ]);

        Auth::user()->offlineActivities()->create($request->all());

        return redirect()->route('dashboard')->with('success', 'Aktivitas offline berhasil ditambahkan!');
    }

    public function show(OfflineActivity $offlineActivity)
    {
        if ($offlineActivity->user_id !== Auth::id()) {
            abort(403);
        }

        return view('offline_activities.show', compact('offlineActivity'));
    }

    public function edit(OfflineActivity $offlineActivity)
    {
        if ($offlineActivity->user_id !== Auth::id()) {
            abort(403);
        }

        return view('offline_activities.edit', compact('offlineActivity'));
    }

    public function update(Request $request, OfflineActivity $offlineActivity)
    {
        if ($offlineActivity->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'activity_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'scheduled_at' => 'required|date',
        ]);

        $offlineActivity->update($request->all());

        return redirect()->route('offline-activities.show', $offlineActivity)->with('success', 'Aktivitas offline berhasil diperbarui!');
    }

    public function destroy(OfflineActivity $offlineActivity)
    {
        if ($offlineActivity->user_id !== Auth::id()) {
            abort(403);
        }

        $offlineActivity->delete();

        return redirect()->route('dashboard')->with('success', 'Aktivitas offline berhasil dihapus!');
    }
}

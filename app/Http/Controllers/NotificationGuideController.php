<?php

namespace App\Http\Controllers;

use App\Models\NotificationGuide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationGuideController extends Controller
{
    public function index()
    {
        $guides = Auth::user()->notificationGuides()->latest()->get();
        return view('notification_guides.index', compact('guides'));
    }

    public function create()
    {
        return view('notification_guides.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Auth::user()->notificationGuides()->create($request->all());

        return redirect()->route('dashboard')->with('success', 'Panduan notifikasi berhasil ditambahkan!');
    }

    public function show(NotificationGuide $notificationGuide)
    {
        if ($notificationGuide->user_id !== Auth::id()) {
            abort(403);
        }

        return view('notification_guides.show', compact('notificationGuide'));
    }

    public function edit(NotificationGuide $notificationGuide)
    {
        if ($notificationGuide->user_id !== Auth::id()) {
            abort(403);
        }

        return view('notification_guides.edit', compact('notificationGuide'));
    }

    public function update(Request $request, NotificationGuide $notificationGuide)
    {
        if ($notificationGuide->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $notificationGuide->update($request->all());

        return redirect()->route('notification-guides.show', $notificationGuide)->with('success', 'Panduan notifikasi berhasil diperbarui!');
    }

    public function destroy(NotificationGuide $notificationGuide)
    {
        if ($notificationGuide->user_id !== Auth::id()) {
            abort(403);
        }

        $notificationGuide->delete();

        return redirect()->route('dashboard')->with('success', 'Panduan notifikasi berhasil dihapus!');
    }
}

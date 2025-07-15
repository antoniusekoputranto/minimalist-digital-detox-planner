<?php

namespace App\Http\Controllers;

use App\Models\DetoxPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DetoxPlanController extends Controller
{
    public function index()
    {
        $detoxPlans = Auth::user()->detoxPlans()->latest()->get();
        return view('detox_plans.index', compact('detoxPlans'));
    }

    public function create()
    {
        return view('detox_plans.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'plan_name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'notes' => 'nullable|string',
        ]);

        Auth::user()->detoxPlans()->create($request->all());

        return redirect()->route('dashboard')->with('success', 'Rencana detoks berhasil dibuat!');
    }

    public function show(DetoxPlan $detoxPlan)
    {
        // Pastikan pengguna memiliki akses ke rencana ini
        if ($detoxPlan->user_id !== Auth::id()) {
            abort(403);
        }
        return view('detox_plans.show', compact('detoxPlan'));
    }

    public function edit(DetoxPlan $detoxPlan)
    {
        if ($detoxPlan->user_id !== Auth::id()) {
            abort(403);
        }
        return view('detox_plans.edit', compact('detoxPlan'));
    }

    public function update(Request $request, DetoxPlan $detoxPlan)
    {
        if ($detoxPlan->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'plan_name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'notes' => 'nullable|string',
        ]);

        $detoxPlan->update($request->all());

        return redirect()->route('detox-plans.show', $detoxPlan)->with('success', 'Rencana detoks berhasil diperbarui!');
    }

    public function destroy(DetoxPlan $detoxPlan)
    {
        if ($detoxPlan->user_id !== Auth::id()) {
            abort(403);
        }

        $detoxPlan->delete();

        return redirect()->route('dashboard')->with('success', 'Rencana detoks berhasil dihapus!');
    }
}
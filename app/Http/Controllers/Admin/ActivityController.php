<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activities = Activity::ordered()->get();
        return view('admin.activities.index', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.activities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'required|in:social,health,education,events',
            'order' => 'nullable|integer',
            'active' => 'boolean'
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('activities', 'public');
        }

        $validated['active'] = $request->has('active');
        $validated['order'] = $validated['order'] ?? 0;

        Activity::create($validated);

        return redirect()->route('admin.activities.index')->with('success', 'কার্যক্রম ছবি সফলভাবে যুক্ত হয়েছে');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Activity $activity)
    {
        return view('admin.activities.edit', compact('activity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Activity $activity)
    {
        $validated = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'required|in:social,health,education,events',
            'order' => 'nullable|integer',
            'active' => 'boolean'
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($activity->image && Storage::disk('public')->exists($activity->image)) {
                Storage::disk('public')->delete($activity->image);
            }
            $validated['image'] = $request->file('image')->store('activities', 'public');
        }

        $validated['active'] = $request->has('active');
        $validated['order'] = $validated['order'] ?? $activity->order;

        $activity->update($validated);

        return redirect()->route('admin.activities.index')->with('success', 'কার্যক্রম ছবি সফলভাবে আপডেট হয়েছে');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Activity $activity)
    {
        // Delete image from storage
        if ($activity->image && Storage::disk('public')->exists($activity->image)) {
            Storage::disk('public')->delete($activity->image);
        }

        $activity->delete();

        return redirect()->route('admin.activities.index')->with('success', 'কার্যক্রম ছবি সফলভাবে মুছে ফেলা হয়েছে');
    }
}

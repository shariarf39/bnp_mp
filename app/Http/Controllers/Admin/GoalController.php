<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteContent;
use Illuminate\Http\Request;

class GoalController extends Controller
{
    public function index()
    {
        $contents = SiteContent::where('section', 'goals')->get()->pluck('value', 'key')->toArray();
        
        return view('admin.goals.index', compact('contents'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'contents' => 'required|array',
            'contents.*' => 'nullable|string'
        ]);

        foreach ($validated['contents'] as $key => $value) {
            SiteContent::setValue($key, $value, 'goals');
        }

        return redirect()->route('admin.goals.index')
            ->with('success', 'লক্ষ্য সফলভাবে আপডেট হয়েছে');
    }
}

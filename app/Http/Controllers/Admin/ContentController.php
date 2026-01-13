<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteContent;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index()
    {
        $sections = [
            'hero' => 'হিরো সেকশন',
            'stats' => 'পরিসংখ্যান',
            'goals' => 'লক্ষ্য'
        ];
        
        $contents = SiteContent::all()->groupBy('section');
        
        return view('admin.content.index', compact('sections', 'contents'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'contents' => 'required|array',
            'contents.*' => 'nullable|string'
        ]);

        foreach ($validated['contents'] as $key => $value) {
            $section = $request->input('sections.' . $key);
            SiteContent::setValue($key, $value, $section);
        }

        return redirect()->route('admin.content.index')
            ->with('success', 'কন্টেন্ট সফলভাবে আপডেট হয়েছে');
    }
}

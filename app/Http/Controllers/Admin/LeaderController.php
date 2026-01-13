<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteContent;
use Illuminate\Support\Facades\Storage;

class LeaderController extends Controller
{
    public function index()
    {
        $contents = SiteContent::where('section', 'leader')->get()->pluck('value', 'key')->toArray();
        return view('admin.leader.index', compact('contents'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'contents' => 'required|array',
            'contents.*' => 'nullable|string',
            'leader_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Handle image upload
        if ($request->hasFile('leader_image')) {
            // Delete old image if exists
            $oldImage = SiteContent::where('key', 'leader_image')->where('section', 'leader')->first();
            if ($oldImage && $oldImage->value && Storage::disk('public')->exists($oldImage->value)) {
                Storage::disk('public')->delete($oldImage->value);
            }

            // Store new image
            $path = $request->file('leader_image')->store('leader-images', 'public');
            SiteContent::setValue('leader_image', $path, 'leader');
        }

        // Update text content
        foreach ($validated['contents'] as $key => $value) {
            SiteContent::setValue($key, $value, 'leader');
        }

        return redirect()->route('admin.leader.index')->with('success', 'নেতা সেকশন সফলভাবে আপডেট হয়েছে');
    }
}

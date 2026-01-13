<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index()
    {
        $about = AboutContent::getContent();
        return view('admin.about.index', compact('about'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'page_title' => 'required|string|max:255',
            'page_subtitle' => 'nullable|string',
            'bio_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bio_title' => 'required|string|max:255',
            'bio_description_1' => 'nullable|string',
            'bio_description_2' => 'nullable|string',
            'full_name' => 'required|string|max:255',
            'party_name' => 'required|string|max:255',
            'constituency' => 'required|string|max:255',
            'experience' => 'required|string|max:255',
            'quote_text' => 'nullable|string',
            'quote_author' => 'nullable|string|max:255',
        ]);

        $about = AboutContent::getContent();

        // Handle image upload
        if ($request->hasFile('bio_image')) {
            // Delete old image
            if ($about->bio_image && Storage::disk('public')->exists($about->bio_image)) {
                Storage::disk('public')->delete($about->bio_image);
            }
            $validated['bio_image'] = $request->file('bio_image')->store('about', 'public');
        }

        $about->update($validated);

        return redirect()->route('admin.about.index')
            ->with('success', 'আমার সম্পর্কে পেজ সফলভাবে আপডেট হয়েছে');
    }

    public function updateTimeline(Request $request)
    {
        $about = AboutContent::getContent();
        
        $timeline = [];
        $years = $request->input('timeline_year', []);
        $titles = $request->input('timeline_title', []);
        $descriptions = $request->input('timeline_description', []);

        foreach ($years as $index => $year) {
            if (!empty($year) && !empty($titles[$index])) {
                $timeline[] = [
                    'year' => $year,
                    'title' => $titles[$index],
                    'description' => $descriptions[$index] ?? '',
                ];
            }
        }

        $about->update(['timeline_events' => $timeline]);

        return redirect()->route('admin.about.index')
            ->with('success', 'টাইমলাইন সফলভাবে আপডেট হয়েছে');
    }

    public function updateVisions(Request $request)
    {
        $about = AboutContent::getContent();
        
        $visions = [];
        $titles = $request->input('vision_title', []);
        $descriptions = $request->input('vision_description', []);

        foreach ($titles as $index => $title) {
            if (!empty($title)) {
                $visions[] = [
                    'title' => $title,
                    'description' => $descriptions[$index] ?? '',
                ];
            }
        }

        $about->update(['vision_cards' => $visions]);

        return redirect()->route('admin.about.index')
            ->with('success', 'দৃষ্টিভঙ্গি সফলভাবে আপডেট হয়েছে');
    }
}

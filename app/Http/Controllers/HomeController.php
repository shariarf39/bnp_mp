<?php

namespace App\Http\Controllers;

use App\Models\HeroSlide;
use App\Models\SiteContent;
use App\Models\Activity;
use App\Models\AboutContent;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $heroSlides = HeroSlide::active()->ordered()->get();
        $content = SiteContent::all()->pluck('value', 'key')->toArray();
        $activities = Activity::active()->ordered()->take(6)->get(); // First 6 for home page
        return view('home', compact('heroSlides', 'content', 'activities'));
    }

    public function about()
    {
        $about = AboutContent::getContent();
        return view('about', compact('about'));
    }

    public function gallery()
    {
        $activities = Activity::active()->ordered()->get();
        return view('gallery', compact('activities'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable|max:20',
            'subject' => 'nullable|max:255',
            'message' => 'required',
            'attachment' => 'nullable|file|mimes:jpeg,jpg,png,gif,mp4,mov,avi,pdf|max:20480', // 20MB max
        ]);

        // Handle file upload
        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('contact_attachments', $filename, 'public');
            $validated['attachment'] = $path;
        }

        // Save to database
        ContactMessage::create($validated);

        return redirect()->back()->with('success', 'আপনার বার্তা সফলভাবে পাঠানো হয়েছে!');
    }
}

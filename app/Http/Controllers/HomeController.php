<?php

namespace App\Http\Controllers;

use App\Models\HeroSlide;
use App\Models\SiteContent;
use App\Models\Activity;
use App\Models\AboutContent;
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
            'email' => 'required|email',
            'phone' => 'nullable|max:20',
            'message' => 'required',
        ]);

        // Here you can save to database or send email
        // For now, just redirect back with success message

        return redirect()->back()->with('success', 'আপনার বার্তা সফলভাবে পাঠানো হয়েছে!');
    }
}

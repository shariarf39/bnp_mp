<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }

    public function gallery()
    {
        return view('gallery');
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

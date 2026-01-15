<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSlide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactSlideController extends Controller
{
    public function index()
    {
        $slides = ContactSlide::ordered()->get();
        return view('admin.contact-slides.index', compact('slides'));
    }

    public function create()
    {
        return view('admin.contact-slides.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:20480',
            'title' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'active' => 'nullable|boolean'
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('contact-slides', 'public');
            $validated['image'] = $imagePath;
        }

        $validated['active'] = $request->has('active');
        $validated['order'] = $validated['order'] ?? ContactSlide::max('order') + 1;

        ContactSlide::create($validated);

        return redirect()->route('admin.contact-slides.index')
            ->with('success', 'যোগাযোগ পেজ স্লাইড সফলভাবে যুক্ত হয়েছে');
    }

    public function edit(ContactSlide $contactSlide)
    {
        return view('admin.contact-slides.edit', ['slide' => $contactSlide]);
    }

    public function update(Request $request, ContactSlide $contactSlide)
    {
        $validated = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:20480',
            'title' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'active' => 'nullable|boolean'
        ]);

        if ($request->hasFile('image')) {
            if ($contactSlide->image) {
                Storage::disk('public')->delete($contactSlide->image);
            }
            $imagePath = $request->file('image')->store('contact-slides', 'public');
            $validated['image'] = $imagePath;
        }

        $validated['active'] = $request->has('active');

        $contactSlide->update($validated);

        return redirect()->route('admin.contact-slides.index')
            ->with('success', 'যোগাযোগ পেজ স্লাইড সফলভাবে আপডেট হয়েছে');
    }

    public function destroy(ContactSlide $contactSlide)
    {
        if ($contactSlide->image) {
            Storage::disk('public')->delete($contactSlide->image);
        }
        
        $contactSlide->delete();

        return redirect()->route('admin.contact-slides.index')
            ->with('success', 'যোগাযোগ পেজ স্লাইড সফলভাবে মুছে ফেলা হয়েছে');
    }
}

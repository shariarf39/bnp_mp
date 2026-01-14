<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSlide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroSlideController extends Controller
{
    public function index()
    {
        $slides = HeroSlide::ordered()->get();
        return view('admin.hero-slides.index', compact('slides'));
    }

    public function create()
    {
        return view('admin.hero-slides.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:20048',
            'order' => 'nullable|integer',
            'active' => 'nullable|boolean'
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('hero-slides', 'public');
            $validated['image'] = $imagePath;
        }

        $validated['active'] = $request->has('active');
        $validated['order'] = $validated['order'] ?? HeroSlide::max('order') + 1;

        HeroSlide::create($validated);

        return redirect()->route('admin.hero-slides.index')
            ->with('success', 'স্লাইড সফলভাবে যুক্ত হয়েছে');
    }

    public function edit(HeroSlide $heroSlide)
    {
        return view('admin.hero-slides.edit', ['slide' => $heroSlide]);
    }

    public function update(Request $request, HeroSlide $heroSlide)
    {
        $validated = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20048',
            'order' => 'nullable|integer',
            'active' => 'nullable|boolean'
        ]);

        if ($request->hasFile('image')) {
            if ($heroSlide->image) {
                Storage::disk('public')->delete($heroSlide->image);
            }
            $imagePath = $request->file('image')->store('hero-slides', 'public');
            $validated['image'] = $imagePath;
        }

        $validated['active'] = $request->has('active');

        $heroSlide->update($validated);

        return redirect()->route('admin.hero-slides.index')
            ->with('success', 'স্লাইড সফলভাবে আপডেট হয়েছে');
    }

    public function destroy(HeroSlide $heroSlide)
    {
        if ($heroSlide->image) {
            Storage::disk('public')->delete($heroSlide->image);
        }
        
        $heroSlide->delete();

        return redirect()->route('admin.hero-slides.index')
            ->with('success', 'স্লাইড সফলভাবে মুছে ফেলা হয়েছে');
    }
}

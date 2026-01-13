<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
    public function uploadAboutLogo(Request $request)
    {
        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            $oldLogo = \App\Models\SiteContent::getValue('about_logo');
            if ($oldLogo && Storage::disk('public')->exists($oldLogo)) {
                Storage::disk('public')->delete($oldLogo);
            }

            // Store new logo
            $logoPath = $request->file('logo')->store('about', 'public');
            
            // Update database
            \App\Models\SiteContent::setValue('about_logo', $logoPath, 'about');

            return response()->json([
                'success' => true,
                'message' => 'লোগো সফলভাবে আপলোড হয়েছে',
                'path' => $logoPath,
                'url' => asset('storage/' . $logoPath)
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'ফাইল আপলোড করতে ব্যর্থ'
        ], 400);
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AdminUserController extends Controller
{
    public function index()
    {
        $admins = User::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.admins.index', compact('admins'));
    }

    public function create()
    {
        return view('admin.admins.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Password::min(6)],
        ], [
            'name.required' => 'নাম প্রয়োজন',
            'email.required' => 'ইমেইল প্রয়োজন',
            'email.email' => 'বৈধ ইমেইল প্রয়োজন',
            'email.unique' => 'এই ইমেইল ইতিমধ্যে ব্যবহৃত হয়েছে',
            'password.required' => 'পাসওয়ার্ড প্রয়োজন',
            'password.confirmed' => 'পাসওয়ার্ড মিলছে না',
            'password.min' => 'পাসওয়ার্ড কমপক্ষে ৬ অক্ষরের হতে হবে',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.admins.index')
            ->with('success', 'অ্যাডমিন সফলভাবে যোগ করা হয়েছে');
    }

    public function edit(User $admin)
    {
        return view('admin.admins.edit', compact('admin'));
    }

    public function update(Request $request, User $admin)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $admin->id,
            'password' => ['nullable', 'confirmed', Password::min(6)],
        ], [
            'name.required' => 'নাম প্রয়োজন',
            'email.required' => 'ইমেইল প্রয়োজন',
            'email.email' => 'বৈধ ইমেইল প্রয়োজন',
            'email.unique' => 'এই ইমেইল ইতিমধ্যে ব্যবহৃত হয়েছে',
            'password.confirmed' => 'পাসওয়ার্ড মিলছে না',
            'password.min' => 'পাসওয়ার্ড কমপক্ষে ৬ অক্ষরের হতে হবে',
        ]);

        $admin->name = $request->name;
        $admin->email = $request->email;
        
        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
        }
        
        $admin->save();

        return redirect()->route('admin.admins.index')
            ->with('success', 'অ্যাডমিন সফলভাবে আপডেট করা হয়েছে');
    }

    public function destroy(User $admin)
    {
        // Prevent deleting the last admin
        if (User::count() <= 1) {
            return redirect()->route('admin.admins.index')
                ->with('error', 'সর্বশেষ অ্যাডমিন মুছে ফেলা যাবে না');
        }

        // Prevent deleting yourself
        if ($admin->id === auth()->id()) {
            return redirect()->route('admin.admins.index')
                ->with('error', 'আপনি নিজেকে মুছে ফেলতে পারবেন না');
        }

        $admin->delete();

        return redirect()->route('admin.admins.index')
            ->with('success', 'অ্যাডমিন সফলভাবে মুছে ফেলা হয়েছে');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Booking;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $bookingCount = Booking::where('user_id', Auth::id())->count();
        return view('dashboard', [
            'bookingCount' => $bookingCount
        ]);
    }

    public function uploadProfileImage(Request $request)
    {
        $request->validate([
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $user = Auth::user();
        $file = $request->file('profile_image');
        $filename = 'user_' . $user->id . '_' . time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/profile', $filename);
        $user->profile_image = $filename;
        $user->save();
        return redirect()->route('home')->with('success', 'Foto profil berhasil diupload!');
    }

    public function dashboardAdmin()
    {
        $userCount = \App\Models\User::count();
        $bookingCount = \App\Models\Booking::count();
        return view('dashboard_admin', [
            'userCount' => $userCount,
            'bookingCount' => $bookingCount
        ]);
    }

    public function users()
    {
        $users = \App\Models\User::all();
        return view('users.index', compact('users'));
    }
}

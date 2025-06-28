<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Menampilkan semua booking milik user yang login
    public function index()
    {
        $bookings = Booking::where('user_id', Auth::id())->get();
        return view('bookings.index', compact('bookings'));
    }

    // Menampilkan form tambah booking
    public function create()
    {
        return view('bookings.create');
    }

    // Menyimpan data booking baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_pemesan'   => 'required|string|max:255',
            'nama_ruangan'   => 'required|string|max:255',
            'tanggal'        => 'required|date',
            'waktu_mulai'    => 'required',
            'waktu_selesai'  => 'required|after:waktu_mulai',
            'keperluan'      => 'required|string|max:255',
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::id(); // Simpan ID user yang login

        Booking::create($data);

        return redirect()->route('bookings.index')
                         ->with('success', 'Booking berhasil ditambahkan.');
    }

    // Menampilkan form edit booking (hanya milik user)
    public function edit($id)
    {
        $booking = Booking::where('id', $id)
                          ->where('user_id', Auth::id())
                          ->firstOrFail();
        return view('bookings.edit', compact('booking'));
    }

    // Menyimpan hasil edit booking
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pemesan'   => 'required|string|max:255',
            'nama_ruangan'   => 'required|string|max:255',
            'tanggal'        => 'required|date',
            'waktu_mulai'    => 'required',
            'waktu_selesai'  => 'required|after:waktu_mulai',
            'keperluan'      => 'required|string|max:255',
        ]);

        $booking = Booking::where('id', $id)
                          ->where('user_id', Auth::id())
                          ->firstOrFail();

        $booking->update($request->all());

        return redirect()->route('bookings.index')
                         ->with('success', 'Booking berhasil diupdate.');
    }

    // Menghapus booking milik user
    public function destroy($id)
    {
        $booking = Booking::where('id', $id)
                          ->where('user_id', Auth::id())
                          ->firstOrFail();

        $booking->delete();

        return redirect()->route('bookings.index')
                         ->with('success', 'Booking berhasil dihapus.');
    }
}

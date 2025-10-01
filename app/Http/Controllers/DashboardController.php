<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $bookings = Auth::user()->bookings()->latest()->paginate(10); // Ambil data pesanan user
        return view('dashboard', compact('bookings'));
    }
}
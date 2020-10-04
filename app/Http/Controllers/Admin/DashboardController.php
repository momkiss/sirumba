<?php

namespace App\Http\Controllers\Admin;

use App\Relawan;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $user = User::count();
        $total = Relawan::count();
        $baru = Relawan::where('status_verifikasi', NULL)->count();
        $terima = Relawan::where('status_verifikasi', 1)->count();
        $tolak = Relawan::where('status_verifikasi', 0)->count();
        return view('admin.dashboard', compact('baru', 'terima', 'tolak','total','user'));
    }
}

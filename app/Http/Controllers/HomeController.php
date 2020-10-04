<?php

namespace App\Http\Controllers;

use App\Pemohon;
use App\Pengembang;
use Illuminate\Http\Request;

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
        $permohonan = Pemohon::where('status', 0)
                                ->orWhere('status', 1)
                                ->orWhere('status', 2)
                                ->get()->count();
        $pengembang = Pengembang::get()->count();
        $perumahan = Pemohon::where('status',3)->get()->count();
        return view('home', compact('permohonan','pengembang','perumahan'));
    }
}

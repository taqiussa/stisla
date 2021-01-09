<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporankeuanganController extends Controller
{
    public function index()
    {
        return view('pages.laporan.laporankeuangan-data');
    }
}

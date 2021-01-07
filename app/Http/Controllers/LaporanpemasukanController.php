<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanpemasukanController extends Controller
{
    public function index()
    {
        return view('pages.laporan.laporanpemasukan-data');
    }
}

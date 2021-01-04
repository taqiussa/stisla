<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keterangan;

class KeteranganController extends Controller
{
    public function index()
    {
        return view('pages.keterangan.keterangan-data', [
            'keterangan' => Keterangan::class
        ]);
    }
}

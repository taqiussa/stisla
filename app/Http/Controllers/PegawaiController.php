<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;

class PegawaiController extends Controller
{
    public function index_view()
    {
        return view('pages.pegawai.pegawai-data', [
            'pegawai' => Pegawai::class
        ]);
    }
}

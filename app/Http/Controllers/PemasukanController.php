<?php

namespace App\Http\Controllers;

use App\Models\Keterangan;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Models\Pemasukan;
use Illuminate\Support\Facades\DB;

class PemasukanController extends Controller
{
    public function index()
    {
        return view('pages.transaksi.pemasukan-data', [
            'pemasukan' => Pemasukan::class
        ]);
    }
}

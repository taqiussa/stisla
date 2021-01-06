<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    public function index()
    {
        return view('pages.transaksi.pengeluaran-data', [
            'pengeluaran' => Pengeluaran::class
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libur;

class LiburController extends Controller
{
    public function index()
    {
        return view('pages.transaksi.libur-data', [
            'libur' => Libur::class
        ]);
    }
}

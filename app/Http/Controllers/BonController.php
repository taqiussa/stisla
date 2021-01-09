<?php

namespace App\Http\Controllers;

use App\Models\Bon;
use Illuminate\Http\Request;

class BonController extends Controller
{
    public function index()
    {
        return view('pages.transaksi.bon-data', [
            'bon' => Bon::class
        ]);
    }
}

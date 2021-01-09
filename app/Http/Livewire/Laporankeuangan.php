<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Bon;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;

class Laporankeuangan extends Component
{
    public $bulan;
    public $tahun;
    public $pemasukan;
    public $pengeluaran;
    public $saldo;
    public $bon;
    public $bln;

    public function render()
    {

        $data = [
            'now' => date('Y'),
        ];
        if (!empty($this->tahun)) {

            $jmlpm = Pemasukan::whereMonth('tanggal', $this->bulan)->whereYear('tanggal', $this->tahun)->sum('total');
            $jmlpg = Pengeluaran::whereMonth('tanggal', $this->bulan)->whereYear('tanggal', $this->tahun)->sum('total');
            $bn = Bon::whereMonth('tanggal', $this->bulan)->whereYear('tanggal', $this->tahun)->sum('jumlah');
            $this->bln = date('M', strtotime($this->tahun . '-' . $this->bulan . '-01'));
            $this->pemasukan = $jmlpm;
            $this->pengeluaran = $jmlpg;
            $this->bon = $bn;
            $this->saldo = $jmlpm - ($jmlpg + $bn);
        }
        return view('livewire.laporan.laporankeuangan', $data);
    }
}

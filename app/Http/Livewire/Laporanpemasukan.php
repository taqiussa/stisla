<?php

namespace App\Http\Livewire;

use App\Models\Bon;
use App\Models\Keterangan;
use App\Models\Libur;
use App\Models\Pegawai;
use App\Models\Pemasukan;
use Livewire\Component;

class Laporanpemasukan extends Component
{
    public $bulan;
    public $tahun;
    public $pegawai_id;
    public $keterangan_id;
    public $nama;
    public $keterangan;
    public $jumlah;
    public $total;
    public $bln;
    public $bon;
    public $libur;

    public function render()
    {

        $data = [
            'ket' => Keterangan::where('jenis', 'pemasukan')->get(),
            'pegawai' => Pegawai::get(),
            'now' => date('Y'),
        ];
        if (!empty($this->keterangan_id)) {

            $cari = Keterangan::find($this->keterangan_id);
            $jml = Pemasukan::whereMonth('tanggal', $this->bulan)->whereYear('tanggal', $this->tahun)->where('pegawai_id', $this->pegawai_id)->where('keterangan_id', $this->keterangan_id)->sum('jumlah');
            $tot = Pemasukan::whereMonth('tanggal', $this->bulan)->whereYear('tanggal', $this->tahun)->where('pegawai_id', $this->pegawai_id)->where('keterangan_id', $this->keterangan_id)->sum('total');
            $bn = Bon::whereMonth('tanggal', $this->bulan)->whereYear('tanggal', $this->tahun)->where('pegawai_id', $this->pegawai_id)->sum('jumlah');
            $lbr = Libur::whereMonth('tanggal', $this->bulan)->whereYear('tanggal', $this->tahun)->where('pegawai_id', $this->pegawai_id)->sum('jumlah');
            $peg = Pegawai::find($this->pegawai_id);
            $this->nama = $peg->nama;
            $this->bln = date('M', strtotime($this->tahun . '-' . $this->bulan . '-01'));
            $this->keterangan = $cari->namaket;
            $this->jumlah = $jml;
            $this->total = $tot;
            $this->libur = $lbr;
            $this->bon = $bn;
        }
        return view('livewire.laporan.laporanpemasukan', $data);
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\Keterangan;
use App\Models\Pegawai;
use App\Models\Pemasukan;
use Livewire\Component;

class Laporanpemasukan extends Component
{
    public $tanggal1;
    public $tanggal2;
    public $bulan;
    public $tahun;
    public $pegawai_id;
    public $keterangan_id;
    public $nama;
    public $keterangan;
    public $jumlah;

    public function render()
    {

        $data = [
            'ket' => Keterangan::where('jenis', 'pemasukan')->get(),
            'pegawai' => Pegawai::get(),
            'now' => date('Y'),
        ];
        if (!empty($this->keterangan_id)) {

            $cari = Keterangan::find($this->keterangan_id);
            $cari2 = Pemasukan::whereMonth('tanggal', $this->bulan)->whereYear('tanggal', $this->tahun)->where('pegawai_id', $this->pegawai_id)->where('keterangan_id', $this->keterangan_id)->sum('jumlah');
            $this->nama = $cari->namaket;
            $this->jumlah = $cari2;
        }
        return view('livewire.laporan.laporanpemasukan', $data);
    }
}

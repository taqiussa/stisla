<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Bon extends Model
{
    use HasFactory;
    protected $table = 'bon';
    protected $fillable = ['tanggal', 'pegawai_id', 'jumlah'];
    public function getTanggalBonAttribute()
    {
        return Carbon::parse($this->attributes['tanggalbon'])->translatedFormat('l, d M y');
    }
    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('pegawai.nama', 'like', '%' . $query . '%');
    }
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
}

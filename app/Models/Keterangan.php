<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keterangan extends Model
{
    use HasFactory;
    protected $table = 'keterangan';
    protected $fillable = ['namaket', 'harga', 'jenis'];
    public function getCreatedAtAttribute()
    {
        return  Carbon::parse($this->attributes['created_at'])->translatedFormat('l, d M y');
    }
    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('nama', 'like', '%' . $query . '%')->whereOr('jenis', 'like', '%' . $query . '%');
    }
    public function pemasukan()
    {
        return $this->hasMany(Pemasukan::class);
    }
}

<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = 'pegawai';
    protected $fillable = ['nama', 'tempat'];
    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])
            ->translatedFormat('l, d M y');
    }
    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('nama', 'like', '%' . $query . '%');
    }
    public function pemasukan()
    {
        return $this->hasMany(Pemasukan::class);
    }
    public function libur()
    {
        return $this->hasMany(Libur::class);
    }
    public function bon()
    {
        return $this->hasMany(Libur::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    public $table ='pembayarans';
    protected $fillable =['waktu', 'nama_siswa', 'rp', 'keterangan', 'angkatan'];
}

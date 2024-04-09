<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experiences extends Model
{
    use HasFactory;
    protected $table = 'experiences';
    protected $fillable = [
        'tahun_awal',
        'tahun_akhir',
        'posisi_pekerjaan',
        'nama_perusahaan',
        'detail_pengalaman'
    ];
}

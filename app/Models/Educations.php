<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Educations extends Model
{
    use HasFactory;
    protected $table = 'educations';
    protected $fillable = [
        'tahun_awal',
        'tahun_akhir',
        'jurusan',
        'nama_sekolah',
        'detail_yang_dipelajari'
    ];
}

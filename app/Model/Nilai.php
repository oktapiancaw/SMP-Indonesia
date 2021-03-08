<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $fillable = ['id_mapel', 'id_siswa', 'np', 'nk', 'nilai_akhir'];
}

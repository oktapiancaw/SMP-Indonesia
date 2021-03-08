<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $fillable = ['id_kelas','nama', 'alamat'];
}

<?php

namespace App\Http\Controllers;

use App\Model\Nilai;
use App\Model\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // jika dia user/siswa maka jalankan ini
        if(auth()->user()->level == 2){
            $siswa = DB::table('siswas')
            ->where('siswas.id_user',  auth()->user()->id)
            ->leftjoin('kelas', 'kelas.id', '=', 'siswas.id_kelas')
            ->select('kelas.kelas', 'siswas.*')
            ->first();
            $nilai = DB::table('nilais')
            ->where('nilais.id_siswa', $siswa->id)
            ->join('mapels', 'mapels.id', '=', 'nilais.id_mapel')
            ->select('mapels.nama_mapel as mapel', 'nilais.*')
            ->get();
            return view('siswa.index', ['nilai' => $nilai, 'siswa' => $siswa]);
        }
        // jika dia guru maka ini
        return view('home');
    }
    public function Admin()
    {
        return view('Admin.index');
    }
}

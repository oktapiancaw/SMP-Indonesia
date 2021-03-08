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
        if(auth()->user()->id != 1){
            $nilai = Nilai::where('id_siswa', auth()->user()->id)->get();
            $siswa = DB::table('siswas')
            ->where('siswas.user_id',  auth()->user()->id)
            ->leftjoin('kelas', 'kelas.id', '=', 'siswas.id_kelas')
            ->select('kelas.kelas', 'siswas.*')
            ->first();
            return view('siswa.index', ['nilai' => $nilai, 'siswa' => $siswa]);
            // bikin file index.blade.php di folder resource/view/siswa/
        }
        return view('home');
    }
    public function Admin()
    {
        return view('Admin.index');
    }
}

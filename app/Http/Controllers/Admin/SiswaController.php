<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Kelas;
use App\Model\Siswa;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = DB::table('siswas')
        ->leftjoin('kelas', 'kelas.id', '=', 'siswas.id_kelas')
        ->select('kelas.kelas', 'siswas.*')
        ->get();
        return view('Admin.Siswa.index', ['siswa' => $siswa]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::all();
        return view('Admin.Siswa.create', ['kelas' => $kelas ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attr = $request->all();
        $attr['created_at'] = Carbon::now();
        $attr['updated_at'] = Carbon::now();
        Siswa::create($attr);

        User::create([
            'username' => $attr['nama'],
            'level' => 2,
            'password' => Hash::make('1234'),
        ]);

        return redirect('admin/siswa')->with(['success' => 'Siswa berhasil di tambahkan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        $kelas = Kelas::all();
        return view('Admin.Siswa.edit', ['siswa' => $siswa, 'kelas' => $kelas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $siswa)
    {
        $attr = $request->all();
        $attr['updated_at'] = Carbon::now();
        $siswa->update($attr);
        return redirect('admin/siswa')->with(['success' => 'Siswa berhasil di ubah!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa)
    {
        Siswa::destroy($siswa->id);
        return redirect('admin/siswa')->with(['success' => 'Siswa berhasil di hapus!']);
    }
}

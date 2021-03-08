<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Mapel;
use App\Model\Nilai;
use App\Model\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nilai = DB::table('nilais')
        ->join('mapels', 'mapels.id', '=', 'nilais.id_mapel')
        ->join('siswas', 'siswas.id', '=', 'nilais.id_siswa')
        ->select('mapels.nama_mapel as mapel', 'siswas.nama as nama_siswa', 'nilais.*')
        ->get();
        return view('Admin.Nilai.index', ['nilai' => $nilai]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mapel = Mapel::all();
        $siswa = Siswa::all();
        return view('Admin.Nilai.create',['mapel' => $mapel, 'siswa' => $siswa]);
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
        $attr['nilai_akhir'] = ($attr['np'] + $attr['nk'])/2;
        Nilai::create($attr);

        return redirect('/admin/nilai');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function show(Nilai $nilai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function edit(Nilai $nilai)
    {
        $mapel = Mapel::all();
        $siswa = Siswa::all();
        return view('Admin.Nilai.edit',['mapel' => $mapel, 'siswa' => $siswa, 'nilai' => $nilai]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nilai $nilai)
    {
        $attr = $request->all();
        $attr['updated_at'] = Carbon::now();
        $nilai->update($attr);

        return redirect('/admin/nilai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nilai $nilai)
    {
        $nilai->destroy($nilai->id);

        return redirect('/admin/nilai');

    }
}

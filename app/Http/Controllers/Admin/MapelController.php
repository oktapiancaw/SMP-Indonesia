<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Guru;
use App\Model\Mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guru = Guru::all();
        $data_mapel = DB::table('mapels')
        ->join('gurus','gurus.id','=', 'mapels.id_guru')
        ->select('mapels.*', 'gurus.nama as nama_guru')
        ->get();
        return view('Admin.Mapel.index', ['data_mapel'=> $data_mapel, 'guru' => $guru]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guru = Guru::all();
        return view('Admin.Mapel.create', ['guru' => $guru]);
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
        Mapel::create($attr);

        return redirect('/admin/mapel');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function edit(Mapel $mapel)
    {
        $guru = Guru::all();
        return view('Admin.Mapel.edit', ['mapel' => $mapel, 'guru' => $guru]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mapel $mapel)
    {
        $attr = $request->all();
        $attr['updated_at'] = Carbon::now();
        $mapel->update($attr);

        return redirect('admin/mapel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mapel $mapel)
    {
        Mapel::destroy($mapel->kode);

        return redirect('admin/mapel');
    }
}

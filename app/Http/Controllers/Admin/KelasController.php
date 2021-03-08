<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = Kelas::all();
        return view('Admin.Kelas.index', ['kelas' => $kelas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Kelas.create');
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
        Kelas::create($attr);
        return redirect('admin/kelas')->with(['success' => 'Kelas berhasil di tambahkan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelas $kelas)
    {
        return view('Admin.Kelas.edit', ['kelas' => $kelas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kelas $kelas)
    {
        $attr = $request->all();
        $attr['updated_at'] = Carbon::now();
        $kelas->update($attr);
        return redirect('admin/kelas')->with(['success' => 'Kelas berhasil di ubah!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelas $kelas)
    {
        Kelas::destroy($kelas->id);
        return redirect('admin/kelas')->with(['success' => 'Kelas berhasil di hapus!']);
    }
}

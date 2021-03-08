<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_guru = Guru::all();
        // die(var_dump($data_guru));
        // dd($data_guru);
        return view('Admin.Guru.index', compact('data_guru'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Guru.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // ini validasi 
        $this->validate($request, [
            // ini rule atau aturannya
            'nama' => 'required',
            'alamat' => 'required',
        ],
        [
            // ini tampilannya/pesannya
            'nama.required' => 'Dimohon untuk mengisi field nama!',
            'alamat.required' => 'Dimohon untuk mengisi field alamat!'
        ]);

        $attr = $request->all();
        $attr['created_at'] = Carbon::now(); 
        $attr['updated_at'] = Carbon::now(); 
        unset($attr['_token']);
        Guru::create($attr);

        return redirect('/admin/guru')->with(['success' => 'Guru berhasil di tambahkan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function show(Guru $guru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function edit(Guru $guru)
    {
        return view('Admin.Guru.edit', compact('guru'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guru $guru)
    {
        $this->validate($request, [
            // ini rule atau aturannya
            'nama' => 'required',
            'alamat' => 'required',
        ],
        [
            // ini tampilannya/pesannya
            'nama.required' => 'Dimohon untuk mengisi field nama!',
            'alamat.required' => 'Dimohon untuk mengisi field alamat!'
        ]);
        $attr = $request->all();
        $attr['updated_at'] = Carbon::now(); 
        $guru->update($attr);

        return redirect('/admin/guru')->with(['success' => 'Guru berhasil di di ubah!']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guru $guru)
    {
        Guru::destroy($guru->id);

        return redirect('/admin/guru')->with(['success' => 'Guru berhasil di hapus!']);
    }
}

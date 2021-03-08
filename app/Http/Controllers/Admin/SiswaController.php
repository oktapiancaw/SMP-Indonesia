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
        $this->validate($request, [
            // ini rule atau aturannya
            'nama' => 'required',
            'id_kelas' => 'required',
            'alamat' => 'required',
        ],
        [
            // ini tampilannya/pesannya
            'nama.required' => 'Dimohon untuk mengisi field nama!',
            'id_kelas.required' => 'Dimohon untuk memilih kelas dengan benar!',
            'alamat.required' => 'Dimohon untuk mengisi field alamat!'
        ]);
        $attr = $request->all();
        User::create([
            // menghapus spasinya dlu lalu di tambahkan " - id yang bikin"
            // lalu semuanya di ubah jadi huruf kecil

            // contoh namanya "Udin Sitinja"
            // Hasilnya "udinsitinja-01"
            
            'username' => strtolower(str_replace(' ', '',$attr['nama']) . '-' . auth()->user()->id),
            'level' => 2,

            // Hash::make() itu sama dengan bcrypt()
            'password' => Hash::make('1234'),
        ]);
        $attr['id_user'] = DB::getPdo()->lastInsertId();

        $attr['created_at'] = Carbon::now();
        $attr['updated_at'] = Carbon::now();
        Siswa::create($attr);


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
        $this->validate($request, [
            // ini rule atau aturannya
            'nama' => 'required',
            'id_kelas' => 'required',
            'alamat' => 'required',
        ],
        [
            // ini tampilannya/pesannya
            'nama.required' => 'Dimohon untuk mengisi field nama!',
            'id_kelas.required' => 'Dimohon untuk memilih kelas dengan benar!',
            'alamat.required' => 'Dimohon untuk mengisi field alamat!'
        ]);
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

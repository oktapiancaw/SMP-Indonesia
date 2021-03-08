@extends('layouts.app')

@section('content')

<div class="row">
  <div class="col">
    <div class="card">
      <p>Nama :  {{ $siswa->nama }}</p>
      <p>Kelas :  {{ $siswa->kelas }}</p>
      <p>alamat :  {{ $siswa->alamat }}</p>
    </div>
  </div>
</div>
<div class="row">
  <div class="col">
    <div class="card">
      // Ini table nilai ane belum
    </div>
  </div>
</div>

@endsection
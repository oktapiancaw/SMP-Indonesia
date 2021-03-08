@extends('layouts.admin')

@section('content')
  <div class="row">
    <div class="col-6">
      <div class="card">
        <div class="card-header">
          <h5>Tambah Data Guru</h5>
        </div>
        <div class="card-body">
          <form action="{{ route('guru.store') }}" method="post">
            @csrf
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" class="form-control @error('nama') is-invalid @enderror">
            @error('nama')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" id="alamat" name="alamat" class="form-control @error('alamat') is-invalid @enderror">
            @error('alamat')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group text-right">
            <button type="submit" class="btn btn-success">Tambah</button>
          </div>

          </form>
        </div>
      </div>
    </div>
  </div>


@endsection
@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h5>Tambah Data</h5>
        </div>
        <div class="card-body">
          <form action="{{ route('siswa.store') }}" method="post">
            @csrf
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" class="form-control">
            @error('nama')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="kelas">Kelas</label>
            <select name="id_kelas" class="form-control" id="listkelas">
              @foreach ($kelas as $item)
                  <option value="{{ $item->id }}">{{ $item->kelas }}</option>
              @endforeach
            </select>
            @error('kelas')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="alamat">alamat</label>
            <input type="text" id="alamat" name="alamat" class="form-control">
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
</div>


@endsection
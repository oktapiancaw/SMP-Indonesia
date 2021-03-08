@extends('layouts.admin')

@section('content')
  <div class="row">
    <div class="col-6">
      <div class="card">
        <div class="card-header">
          <h5>Tambah Data Mata Pelajaran</h5>
        </div>
        <div class="card-body">
          <form action="{{ route('mapel.store') }}" method="post">
            @csrf
          <div class="form-group">
            <label for="guru">Guru</label>
            <select name="id_guru" class="form-control @error('id_guru') is-invalid @enderror" id="listGuru">
              @foreach ($guru as $item)
                  <option value="{{ $item->id }}" >{{ $item->nama }}</option>
              @endforeach
            </select>
            @error('guru')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="nama">Nama Mata Pelajaran</label>
            <input type="text" id="nama" name="nama_mapel" class="form-control @error('nama_mapel') is-invalid @enderror">
            @error('nama_mapel')
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
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
          <form action="{{ route('mapel.update', $mapel->kode) }}" method="post">
            @csrf
            @method('PATCH')
          <div class="form-group">
            <label for="guru">Guru</label>
            <select name="id_guru" class="form-control" id="listGuru">
              @foreach ($guru as $item)
                  <option value="{{ $item->id }}" @if($mapel->id_guru == $item->id) selected @endif>{{ $item->nama }}</option>
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
            <input type="text" id="nama" name="nama_mapel" value="{{ $mapel->nama_mapel ?? '' }}" class="form-control">
            @error('nama_mapel')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <p class="text-subtitle">
              Note*: Jika terdapat kode yang sama di mata pelajaran lain. maka mata pelajaran tersebut akan ikut terubah!
            </p>
          </div>
          <div class="form-group text-right">
            <button type="submit" class="btn btn-success">Update</button>
          </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection
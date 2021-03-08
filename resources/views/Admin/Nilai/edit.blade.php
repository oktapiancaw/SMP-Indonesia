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
          <form action="{{ route('nilai.store') }}" method="post">
            @csrf
          <div class="form-group">
            <label for="siswa">Siswa</label>
            <select name="id_siswa" class="form-control">
              @foreach ($siswa as $item)
                  <option value="{{ $item->id }}"  @if($nilai->id_siswa == $item->id) selected @endif>{{ $item->nama }}</option>
              @endforeach
            </select>
            @error('siswa')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="mapel">Mata Pelajaran</label>
            <select name="id_mapel" class="form-control">
              @foreach ($mapel as $item)
                  <option value="{{ $item->id }}"  @if($nilai->id_mapel == $item->id) selected @endif>{{ $item->nama_mapel }}</option>
              @endforeach
            </select>
            @error('mapel')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="np">Nilai Pengetahuan</label>
            <input type="number" min="0" max="100" id="np" value="{{ $nilai->np }}" name="np" class="form-control">
            @error('np')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="nk">Nilai Keterampilan</label>
            <input type="number" min="0" max="100" id="nk" value="{{ $nilai->nk }}" name="nk" class="form-control">
            @error('nk')
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
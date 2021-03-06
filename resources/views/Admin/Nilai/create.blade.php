@extends('layouts.admin')

@section('content')
  <div class="row">
    <div class="col-6">
      <div class="card">
        <div class="card-header">
          <h5>Tambah Data Nilai</h5>
        </div>
        <div class="card-body">
          <form action="{{ route('nilai.store') }}" method="post">
            @csrf
          <div class="form-group">
            <label for="siswa">Siswa</label>
            <select name="id_siswa" class="form-control @error('id_siswa') is-invalid @enderror">
              @foreach ($siswa as $item)
                  <option value="{{ $item->id }}" >{{ $item->nama }}</option>
              @endforeach
            </select>
            @error('id_siswa')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="mapel">Mata Pelajaran</label>
            <select name="id_mapel" class="form-control @error('id_mapel') is-invalid @enderror">
              @foreach ($mapel as $item)
                  <option value="{{ $item->id }}" >{{ $item->nama_mapel }}</option>
              @endforeach
            </select>
            @error('id_mapel')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="np">Nilai Pengetahuan</label>
            <input type="number" min="0" max="100" id="np" name="np" class="form-control @error('np') is-invalid @enderror">
            @error('np')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="nk">Nilai Keterampilan</label>
            <input type="number" min="0" max="100" id="nk" name="nk" class="form-control @error('nk') is-invalid @enderror">
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


@endsection
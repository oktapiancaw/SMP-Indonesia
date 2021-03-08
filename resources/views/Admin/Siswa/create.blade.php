@extends('layouts.admin')

@section('content')
  <div class="row">
    <div class="col-6">
      <div class="card">
        <div class="card-header">
          <h5>Tambah Data Siswa</h5>
        </div>
        <div class="card-body">
          <form action="{{ route('siswa.store') }}" method="post">
            @csrf
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" class="form-control @error('nama') is-invalid @enderror">


            {{-- ini akan muncul ketika validation mengatakan bahwa ada error di nama/field yang dimaksud --}}
            @error('nama')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
          </div>

          <div class="form-group">
            <label for="kelas">Kelas</label>
            <select name="id_kelas" class="form-control @error('id_kelas') is-invalid @enderror" id="listkelas">
              <option value="">Pilih Kelas</option>
              @foreach ($kelas as $item)
                  <option value="{{ $item->id }}">{{ $item->kelas }}</option>
              @endforeach
            </select>
            @error('id_kelas')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
          </div>

          <div class="form-group">
            <label for="alamat">alamat</label>
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
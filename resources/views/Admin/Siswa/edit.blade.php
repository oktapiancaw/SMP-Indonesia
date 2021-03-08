@extends('layouts.admin')

@section('content')
  <div class="row">
    <div class="col-6">
      <div class="card">
        <div class="card-header">
          <h5>Update Data Siswa</h5>
        </div>
        <div class="card-body">
          <form action="{{ route('siswa.update', $siswa->id) }}" method="post">
            @csrf
            @method('PATCH')
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" value="{{ $siswa->nama }}" class="form-control @error('nama') is-invalid @enderror">
            @error('nama')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="kelas">Kelas</label>
            <select name="id_kelas" class="form-control @error('id_kelas') is-invalid @enderror" id="listkelas">
              @foreach ($kelas as $item)
                  <option value="{{ $item->id }}"  @if($siswa->id_kelas == $item->id) selected @endif>{{ $item->kelas }}</option>
              @endforeach
            </select>
            @error('id_kelas')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" id="alamat" name="alamat" value="{{$siswa->alamat}}" class="form-control @error('alamat') is-invalid @enderror">
            @error('alamat')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group text-right">
            <button type="submit" class="btn btn-success">Update</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>


@endsection
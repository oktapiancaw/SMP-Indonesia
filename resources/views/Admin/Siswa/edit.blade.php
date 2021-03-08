@extends('layouts.admin')

@section('content')
  <div class="row">
    <div class="col-6">
      <div class="card">
        <div class="card-header">
          <h5>Update Data</h5>
        </div>
        <div class="card-body">
          <form action="{{ route('siswa.update', $siswa->id) }}" method="post">
            @csrf
            @method('PATCH')
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" value="{{ $siswa->nama }}" class="form-control">
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
                  <option value="{{ $item->id }}"  @if($siswa->id_kelas == $item->id) selected @endif>{{ $item->kelas }}</option>
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
            <input type="text" id="alamat" name="alamat" value="{{$siswa->alamat}}" class="form-control">
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
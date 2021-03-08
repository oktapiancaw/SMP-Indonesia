@extends('layouts.admin')

@section('content')
  <div class="row">
    <div class="col-6">
      <div class="card">
        <div class="card-header">
          <h5>Tambah Data</h5>
        </div>
        <div class="card-body">
          <form action="{{ route('kelas.store') }}" method="post">
            @csrf
          <div class="form-group">
            <label for="kelas">Nama Kelas</label>
            <input type="text" id="kelas" name="kelas" class="form-control">
            @error('kelas')
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
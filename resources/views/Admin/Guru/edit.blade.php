@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h5>Update Data</h5>
        </div>
        <div class="card-body">
          <form action="{{ route('guru.update', $guru->id) }}" method="post">
            @csrf
            @method('PATCH')
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" id="nama" value="{{ $guru->nama ?? '' }}" name="nama" class="form-control">
            @error('nama')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" id="alamat" name="alamat" value="{{ $guru->alamat ?? '' }}" class="form-control">
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
</div>


@endsection
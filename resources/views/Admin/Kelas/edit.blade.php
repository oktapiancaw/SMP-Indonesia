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
          <form action="{{ route('kelas.update', $kelas->id) }}" method="post">
            @csrf
            @method('PATCH')
          <div class="form-group">
            <label for="kelas">Nama Kelas</label>
            <input type="text" id="kelas" value="{{ $kelas->kelas ?? '' }}" name="kelas" class="form-control">
            @error('kelas')
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
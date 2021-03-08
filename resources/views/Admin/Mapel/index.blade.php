@extends('layouts.admin')

@section('content')
  <div class="row">
    <div class="col text-right">
      <a href="{{ route('mapel.create') }}" class="btn btn-success">Tambah Data</a>
    </div>
  </div>
  <div class="row mt-5">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h5>Data mapel</h5>
        </div>
        <div class="card-body">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Guru</th>
                <th width="20%" class="text-center" scope="col"> Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data_mapel as $item)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item->nama_mapel }}</td>
                  <td>{{ $item->nama_guru }}</td>
                  <td class="text-center">
                    <a href="{{ route('mapel.edit', $item->id)}}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('mapel.destroy', $item->id) }}" method="post" class="d-inline-block">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                  </td>
                </tr>    
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>


@endsection
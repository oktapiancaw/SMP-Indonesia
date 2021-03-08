@extends('layouts.admin')

@section('content')
  <div class="row">
    <div class="col text-right">
      <a href="{{ route('nilai.create') }}" class="btn btn-success">Tambah Data</a>
    </div>
  </div>
  <div class="row mt-5">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h5>Data Nilai</h5>
        </div>
        <div class="card-body">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Mata Pelajaran</th>
                <th class="text-center" scope="col">Nilai Pengetahuan</th>
                <th class="text-center" scope="col">Nilai Keterampilan</th>
                <th class="text-center" scope="col">Nilai Akhir</th>
                <th scope="col">Predikat</th>
                <th width="20%" class="text-center" scope="col"> Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($nilai as $item)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item->nama_siswa }}</td>
                  <td>{{ $item->mapel }}</td>
                  <td class="text-center">{{ $item->np }}</td>
                  <td class="text-center">{{ $item->nk }}</td>
                  <td class="text-center">{{ $item->nilai_akhir }}</td>
                  @if ($item->nilai_akhir >= 70)
                      <td><span class="badge badge-success">Lulus Predikat A</span></td>
                  @elseif($item->nilai_akhir > 90)
                      <td><span class="badge badge-success">Lulus Predikat B</span></td>
                  @else
                      <td><span class="badge badge-success">Tidak Lulus Predikat C</span></td>
                  @endif

                  {{-- Jika user yang aksesnya guru maka tampilkan --}}
                  @if (auth()->user()->level == 1)
                    <td class="text-center">
                      <a href="{{ route('nilai.edit', $item->id)}}" class="btn btn-primary">Edit</a>
                      <form action="{{ route('nilai.destroy', $item->id) }}" method="post" class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                      </form>
                    </td>
                  @endif
                </tr>   
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>


@endsection
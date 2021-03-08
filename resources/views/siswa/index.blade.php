@extends('layouts.admin')

@section('content')

<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">

        <table class="table">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Mata Pelajaran</th>
              <th class="text-center" scope="col">Nilai Pengetahuan</th>
              <th class="text-center" scope="col">Nilai Keterampilan</th>
              <th class="text-center" scope="col">Nilai Akhir</th>
              <th scope="col">Predikat</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($nilai as $item)
              <tr>
                <td>{{ $loop->iteration }}</td>
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
              </tr>   
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection
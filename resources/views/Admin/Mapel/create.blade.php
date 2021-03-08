@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h5>Tambah Data</h5>
        </div>
        <div class="card-body">
          <form action="{{ route('mapel.store') }}" method="post">
            @csrf
          <div class="form-group">
            <label for="guru">Guru</label>
            <select name="id_guru" class="form-control" id="listGuru">
              @foreach ($guru as $item)
                  <option value="{{ $item->id }}" >{{ $item->nama }}</option>
              @endforeach
            </select>
            @error('guru')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="nama">Nama Mata Pelajaran</label>
            <input type="text" id="nama" name="nama_mapel" class="form-control">
            @error('nama_mapel')
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
</div>


@endsection
@push('scripts')
<script>
  $(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
      type: 'GET',
      url: "{{ route('mapel.create') }}",
      datatype: "JSON",
      success: function(data){
        let html = '';
        data.forEach(guru => {
          html += `<option value=${guru.id}>${guru.nama}</option>`
        });
        $('#listGuru').html(html);
      }
    })
  })
</script>
    
@endpush
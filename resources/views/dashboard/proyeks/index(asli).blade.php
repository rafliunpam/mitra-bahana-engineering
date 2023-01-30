@extends('dashboard.layouts.main')


@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tiket Proyek Proyek</h1>
      </div>

      @if(session()->has('success'))
      <div class="alert alert-success col-lg-10" role="alert">
        {{ session('success') }}
      </div>

      @endif
      <div class="table-responsive col-lg-10">
            
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Kode Proyek</th>
              <th scope="col">Client</th>
              <th scope="col">Tim Proyek</th>
              <th scope="col">Nama Proyek</th>
              <th scope="col">Status</th>
              <th scope="col">File SPK</th>

              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($proyeks as $proyek)
          @if($proyek->user_id !== NULL)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $proyek->no_tiket_proyek }}</td>
            <td>{{ $proyek->donesale->sale->client->company_name }}</td>
            <td>{{ $proyek->user->name}}</td>
            <td>{{ $proyek->title }}</td>
            <td>{{ $proyek->status}}</td>
            <td>
            @if($proyek->file == NULL)
            <label class="badge bg-dark" type="text">Not Uploaded</label>
            @else($proyek->file !== NULL)
            <a class="badge bg-primary" href="/storage/{{ $proyek->file }}">Download<span data-feather="file-text" class="align-text-center "></span></a>
            @endif
            <td>
            @if($proyek->status == "Unprocessed")
              <a class="badge bg-warning" href="/dashboard/proyeks/{{ $proyek->id }}">Proses<span data-feather="file-text" class="align-text-center "></span></a>
            @elseif($proyek->status == "Process")
            <a href="/dashboard/proyeks/{{ $proyek->id }}/update" class="badge bg-info"><span data-feather="eye" class="align-text-bottom"></span></a>
              <a href="/dashboard/proyeks/{{$proyek->id}}/update" class="badge bg-dark"><span data-feather="edit" class="align-text-bottom"></span></a>
            @elseif($proyek->status =="Success")
            <button class="badge bg-dark border-0" onclick="return confirm ('Menunggu Konfirmasi Dari Manajer!')">
              <span data-feather="loader" class="align-text-bottom"></span>Waiting for confirmation</button>
            @endif
            </td>
          </tr>
          @else
          @endif
          @endforeach
          </tbody>
        </table>
      </div>
@endsection
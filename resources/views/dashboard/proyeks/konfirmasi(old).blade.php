@extends('dashboard.layouts.main')
@section('container')
<div class="breadcrumbs">
                <div class="col-sm-6">
                    <div class="page-header float-left">
                        <div class="page-title text-center mt-2">
                            <h3>Konfirmasi Tiket Proyek</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content mt-3">
            <div class="col-sm-12">
            @if(session()->has('success'))
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                    <span class="badge badge-pill badge-success">Success</span> {{ session ('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            @elseif(session()->has('danger'))
                <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                    <span class="badge badge-pill badge-success">Success</span> {{ session ('danger') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            @endif
                </div>
            </div>
<div class="table-responsive col-lg-12">
<!-- @cannot('tim_sales')
        <a href="/dashboard/sales/create" class="btn btn-primary mb-3">Create New Tiket</a>
  @endcannot -->


  
  <div class="table-responsive col-lg-12">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h5">Permintaan</h1>
      </div>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No. Tiket Proyek</th>
              <th scope="col">Client</th>
              <th scope="col">Tim Proyek</th>
              <th scope="col">Tahapan</th>
              <!-- <th scope="col" class="text-center">Status</th> -->
              <th scope="col">File</th>
              <th scope="col">Tanggal Update</th>

              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($statuses as $status)
          
          @if($status->status == "Success")
          <tr>
            <td>{{ $status->proyek->no_tiket_proyek }}</td>
            <td>{{ $status->proyek->donesale->sale->client->company_name}}</td>
            <td>{{ $status->proyek->user->employee->name }}</td>
            <td>{{ $status->tahapan}}</td>
            
            <td><a href="/storage/{{ $status->file }}">Download<span data-feather="file-text" class="align-text-center"></span></a></td>
            <td>{{ $status->updated_at }}</td>

            <td>
            @if($status->keterangan == "Done")
              <a href="" class="badge bg-dark">Confirmed</a>
            @elseif($status->status == "Success")
            <a href="/dashboard/proyeks/statuses/{{ $status->id }}" class="badge bg-primary"><span data-feather="check" class="align-text-bottom" onclick="return confirm ('Confirm?')"></span>Done</a>
            @endif
            </td>
            @else
            @endif
          @endforeach
          </tbody>
        </table>
      </div>


      <div class="table-responsive col-lg-12">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h5">Permintaan Tiket Proyek Solved</h1>
      </div>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">No. Tiket Proyek</th>
              <th scope="col">Client</th>
              <th scope="col">Tim Proyek</th>
              <th scope="col">File</th>
              <th scope="col">Tanggal Update</th>

              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($proyeks as $proyek)
          @if($proyek->status == "Success")
          <tr>
            <td></td>
            <td>{{ $proyek->no_tiket_proyek }}</td>
            <td>{{ $proyek->donesale->sale->client->company_name}}</td>
            <td>{{ $proyek->user->name }}</td>
            
            <td><a href="/storage/{{ $status->file }}">Download<span data-feather="file-text" class="align-text-center"></span></a></td>
            <td>{{ $status->updated_at }}</td>

            <td>
            @if($proyek->status == "Done")
              <a href="" class="badge bg-dark">Confirmed</a>
            @elseif($proyek->status == "Success")
            <a href="/dashboard/proyekAcc/{{ $proyek->id }}/priview" class="badge bg-info"><span data-feather="eye" class="align-text-bottom"></span>Priview</a>
            <a href="/dashboard/proyekDone/{{ $proyek->id }}" class="badge bg-primary" onclick="return confirm ('Confirm?')"><span data-feather="check" class="align-text-bottom"></span>Done</a>
            @endif
            </td>
            @else
            @endif
          @endforeach
          </tbody>
        </table>
      </div>


@endsection
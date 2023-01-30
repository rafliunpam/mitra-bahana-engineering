@extends('dashboard.layouts.main')


@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Konfirmasi Tiket Sales</h1>
</div>

@if(session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
        {{ session('success') }}
    </div>
@endif
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
              <th scope="col">#</th>
              <th scope="col">No. Tiket Sales</th>
              <th scope="col">Tim Sales</th>
              <th scope="col">Client</th>
              <th scope="col">Keterangan</th>
              <!-- <th scope="col" class="text-center">Status</th> -->
              <th scope="col">File</th>
              <th scope="col">Tanggal Update</th>

              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($sales as $sale)
          @if($sale->status == "Success")
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $sale->no_tiket_sales }}</td>
            <td>{{ $sale->user->name }}</td>
            <td>{{ $sale->client->company_name}}</td>
            <td>{{ $sale->keterangan}}</td>

            <!-- <td class="text-center">
            @if($sale->status == "Unprocessed")
            <label class="label bg-danger text-white">{{ $sale->status}}</label>
            @elseif($sale->status == "Process")
            <label class="label bg-warning text-white">{{ $sale->status}}</label>
            @elseif($sale->status == "Success")
            <label class="label bg-success text-white">{{ $sale->status}}</label>
            @elseif($sale->status == "Cancle")
            <label class="label bg-dark text-white">{{ $sale->status}}</label>
            @endif
            </td> -->
            
            <td><a href="/storage/{{ $sale->file }}">Download<span data-feather="file-text" class="align-text-center"></span></a></td>
            <td>{{ $sale->updated_at }}</td>

            <td>
            @if($sale->keterangan == "Done")
              <a href="" class="badge bg-dark">Confirmed</a>
            @elseif($sale->status == "Success")
            <a href="/dashboard/saleDone/{{ $sale->id }}" class="badge bg-primary"><span data-feather="check" class="align-text-bottom" onclick="return confirm ('Selesaikan Tiket?')"></span>Done</a>
            @endif
            </td>
            @else
            @endif
          @endforeach
          </tbody>
        </table>
      </div>


@endsection
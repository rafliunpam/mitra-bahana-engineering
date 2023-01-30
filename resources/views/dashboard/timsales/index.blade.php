@extends('dashboard.layouts.main')


@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tiket Sales</h1>
</div>

@if(session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
        {{ session('success') }}
    </div>
@endif
<div class="table-responsive col-lg-8">
        
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h5">Tiket Saya</h1>
      </div>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">No. Tiket Sales</th>
              <th scope="col">Tim Sales</th>
              <th scope="col">Client</th>
              <th scope="col">Status</th>
              <th scope="col">Tanggal</th>

              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($sales as $sale)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $sale->no_tiket_sales }}</td>
            <td>{{ $sale->user->name }}</td>
            <td>{{ $sale->client->company_name}}</td>
            <td>{{ $sale->status}}</td>
            <td>{{ $sale->updated_at }}</td>

            <td>
              <a href="/dashboard/timsales/{{ $sale->id }}/edit" class="badge bg-warning"><span data-feather="edit" class="align-text-bottom"></span></a>
          </tr>
          @endforeach
          </tbody>
        </table>
      </div>
@endsection
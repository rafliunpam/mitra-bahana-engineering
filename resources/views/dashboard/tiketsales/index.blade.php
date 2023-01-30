@extends('dashboard.layouts.main')


@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tiket Proyek</h1>
</div>

@if(session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
        {{ session('success') }}
    </div>
@endif
<div>Tiket Pending</div>
<div class="table-responsive col-lg-8">
        <a href="/dashboard/tiketsales/create" class="btn btn-primary mb-3">Create New Tiket</a>
        <a href="/dashboard/tiket_sales/status_sales" class="btn btn-warning mb-3 text-white">Detail Tiket</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">No. Tiket Sales</th>
              <th scope="col">Client</th>
              <th scope="col">Penanggung Jawab</th>
              <th scope="col">Status</th>
              <th scope="col">Catatan</th>
              <th scope="col">Tanggal Update</th>

              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($tiket_sales as $tiket_sale)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $tiket_sale->no_tiket_sales }}</td>
            <td>{{ $tiket_sale->client->company_name}}</td>
            <td>{{ $tiket_sale->user->name }}</td>
            <td>{{ $tiket_sale->user->email }}</td>
            <td>{{ $tiket_sale->catatan }}</td>
            <!-- <td>{{ $tiket_sale->created_at }}</td> -->
            <td>{{ $tiket_sale->updated_at }}</td>

            <td>
              <a href="" class="badge bg-info"><span data-feather="eye" class="align-text-bottom"></span></a>
              <a href="/edit" class="badge bg-warning"><span data-feather="edit" class="align-text-bottom"></span></a>

              <form action="" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button class="badge bg-danger border-0" onclick="return confirm ('Apakah Anda Yakin Ingin Mengahpus Postingan?')">
              <span data-feather="x-circle" class="align-text-bottom"></span>
              </button>
              </form>
            </td>
          </tr>
          @endforeach
          </tbody>
        </table>
      </div>

      <div class="table-responsive col-lg-8">
        <a href="/dashboard/tiketsales/create" class="btn btn-success mb-3">Tiket Saya</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">No. Tiket Sales</th>
              <th scope="col">Client</th>
              <th scope="col">Status</th>
              <th scope="col">Catatan</th>
              <th scope="col">Tanggal Update</th>

              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($tiket_sales as $tiket_sale)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $tiket_sale->no_tiket_sales }}</td>
            <td>{{ $tiket_sale->client->company_name}}</td>
            <td>{{ $tiket_sale->user->email }}</td>
            <td>{{ $tiket_sale->catatan }}</td>
            <!-- <td>{{ $tiket_sale->created_at }}</td> -->
            <td>{{ $tiket_sale->updated_at }}</td>

            <td>
              <a href="" class="badge bg-info"><span data-feather="eye" class="align-text-bottom"></span></a>
              <a href="/edit" class="badge bg-warning"><span data-feather="edit" class="align-text-bottom"></span></a>

              <form action="" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button class="badge bg-danger border-0" onclick="return confirm ('Apakah Anda Yakin Ingin Mengahpus Postingan?')">
              <span data-feather="x-circle" class="align-text-bottom"></span>
              </button>
              </form>
            </td>
          </tr>
          @endforeach
@endsection
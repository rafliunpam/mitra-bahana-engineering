@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Konfirmasi Selesai Tiket Sales</h1>
</div>

  <div class="col-lg-10">
  <form method="post" action="/dashboard/donesales" enctype="multipart/form-data" class="mb-5">
    @csrf

    <div class="mb-3">
        <input type="hidden" class="form-control " id="sale_id" name="sale_id" value="{{ $sale->id }}">
        <input type="hidden" class="form-control " id="created_at" name="created_at" value="{{ $sale->created_at }}">
        <input type="hidden" class="form-control " id="updated_at" name="updated_at" value="{{ $sale->updated_at }}">
      </div>
      <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No. Tiket Sales</th>
              <th scope="col">Tim Sales</th>
              <th scope="col">Client</th>
              <th scope="col">Status</th>
              <th scope="col">Keterangan</th>
              <th scope="col">Tanggal Update</th>
            </tr>
          </thead>
          <tbody>
          <tr>
            <td>{{ $sale->no_tiket_sales }}</td>
            <td>{{ $sale->user->name }}</td>
            <td>{{ $sale->client->company_name}}</td>
            <td>{{ $sale->status}}</td>
            <td>{{ $sale->keterangan}}</td>
            <td>{{ $sale->updated_at }}</td>
            </td>
          </tr>
          </tbody>
        </table>
            <button type="submit" class="btn btn-success">Accept</button>

@endsection
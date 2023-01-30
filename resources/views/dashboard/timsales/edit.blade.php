@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Update Tiket</h1>
</div>

<div class="col-lg-8">
  <form method="post" action="/dashboard/timsales/{{ $sale->id }}" enctype="multipart/form-data" class="mb-5">
  @method ('put')
    @csrf
    <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No. Tiket Sales</th>
              <th scope="col">Tim Sales</th>
              <th scope="col">Client</th>
              <th scope="col">Status</th>
              <th scope="col">Tanggal</th>
            </tr>
          </thead>
          <tbody>
          <tr>
            <td>{{ $sale->no_tiket_sales }}</td>
            <td>{{ $sale->user->name }}</td>
            <td>{{ $sale->client->company_name}}</td>
            <td>{{ $sale->status}}</td>
            <td>{{ $sale->updated_at }}</td>
        </table>

      <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <input type="text" class="form-control @error('status') is-invalid @enderror" id="status" name="status" value="{{ $sale->status }}">
        @error ('status')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>

      <button type="submit" class="btn btn-primary">Update Tiket</button>
    </form>



@endsection
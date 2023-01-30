@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Update Tiket</h1>
</div>

<div class="col-lg-8">
  <form method="post" action="/dashboard/sales/{{ $sale->id }}" enctype="multipart/form-data" class="mb-5">
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


    <!-- <div class="mb-3">
    <label for="status" class="form-label">Status</label>
    <div class="group-check">
        <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="Unprocessed">
        <label class="form-check-label" for="exampleRadios1" >Unprocessed</label>

        <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="Process">
        <label class="form-check-label" for="exampleRadios2">Process</label>

        <input class="form-check-input" type="radio" name="status" id="exampleRadios3" value="Success">
        <label class="form-check-label" for="exampleRadios3">Success</label>

        <input class="form-check-input" type="radio" name="status" id="exampleRadios3" value="Cancle">
        <label class="form-check-label" for="exampleRadios4">Cancle</label>

        <input class="form-check-input" type="radio" name="status" id="exampleRadios3" value="Done">
        <label class="form-check-label" for="exampleRadios5">Done</label>
      </div>
    </div> -->

        
      <div class="mb-3">
        <label for="keterangan" class="form-label">Keterangan</label>
        <input type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" value="{{ $sale->keterangan }}">
        @error ('keterangan')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>

      <div class="form-group mb-3">
                <label for="fileUrl"><span data-feather="file-text" class="align-text-bottom"></span> Upload File (max 2mb)</label>
                  <div class="col-5 mb-3 mt-3">
                  </div>
                  <div class="col-6">
                    <input class="form-control" type="file" id="file" name="file"/>
                </div>
              </div>
      

      <button type="submit" class="btn btn-primary">Update Tiket</button>
  

      <form action="/dashboard/sales/{{ $sale->id }}" method="post" class="d-inline">
      <button class="btn bg-danger text-white" onclick="return confirm ('Apakah Anda Yakin Ingin Membatalkan Tiket No : {{ $sale->no_tiket_sales }} Client :{{ $sale->client->company_name }}?')">Cancle
      </button>
      </form>
    @cannot('tim_sales')

    @endcannot

    </form>



@endsection
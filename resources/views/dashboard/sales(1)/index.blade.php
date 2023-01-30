@extends('dashboard.layouts.main')


@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tiket Sales</h1>
</div>

<div class=" mb-3">
        <div class="col-md-6">
            <form action="/dashboard/sales">
                @if (request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('author'))
                <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="search.." name="search" value="{{ request('search') }}">
                <button class="btn btn-danger" type="submit" >Search</button>
            </div>
            </form>
        </div>
    </div>

@if(session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
        {{ session('success') }}
    </div>
@endif
<div class="table-responsive col-lg-12">
@cannot('tim_sales')
        <a href="/dashboard/sales/create" class="btn btn-primary mb-3">Create New Tiket</a>
  @endcannot


  
  <div class="table-responsive col-lg-12">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h5">Tiket Proses</h1>

  <div>
    <label>Status : </label>
    <select id="filter-status" class="form-control">
      <option value="">Pilih Status</option>
      @foreach($sales as $sale)
      @if($sale->status !== "Done")
      <option value="$sale->id">{{ $sale->status }}</option>
      @endif
      @endforeach
    </select>
    
    </div>
      </div>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">No. Tiket Sales</th>
              <th scope="col">Tim Sales</th>
              <th scope="col">Client</th>
              <th scope="col">Keterangan</th>
              <th scope="col" class="text-center">Status</th>
              <th scope="col">File</th>
              <th scope="col">Tanggal Update</th>

              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($sales as $sale)
          @if($sale->keterangan !== "Done")
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $sale->no_tiket_sales }}</td>
            <td>{{ $sale->user->name }}</td>
            <td>{{ $sale->client->company_name}}</td>
            <td>{{ $sale->keterangan}}</td>

            <td class="text-center">
            @if($sale->status == "Unprocessed")
            <label class="label bg-danger text-white">{{ $sale->status}}</label>
            @elseif($sale->status == "Process")
            <label class="label bg-warning text-white">{{ $sale->status}}</label>
            @elseif($sale->status == "Success")
            <label class="label bg-success text-white">{{ $sale->status}}</label>
            @elseif($sale->status == "Cancle")
            <label class="label bg-dark text-white">{{ $sale->status}}</label>
            @endif
            </td>
            
            <td><a href="/storage/{{ $sale->file }}">Download<span data-feather="file-text" class="align-text-center"></span></a></td>
            <td>{{ $sale->updated_at }}</td>

            <td>
            @if($sale->status == "Unprocessed")
              <a href="/dashboard/sales/{{ $sale->id }}" class="badge bg-warning"><span data-feather="edit" class="align-text-bottom"></span>Process</a>
            @elseif($sale->status == "Process")
              <a href="/dashboard/sales/{{ $sale->id }}/edit" class="badge bg-dark"><span data-feather="edit" class="align-text-bottom"></span>Update</a>
              <a href="/dashboard/sales/{{ $sale->id }}" class="badge bg-success"><span data-feather="check" class="align-text-bottom"></span>Success</a>
            @elseif($sale->status == "Success")
            <button class="badge bg-dark border-0" onclick="return confirm ('Menunggu Konfirmasi Dari Manajer!')">
              <span data-feather="loader" class="align-text-bottom"></span>Waiting for confirmation
              </button>
            @elseif($sale->status == "Cancle")
            <form action="/dashboard/donesales/{{ $sale->id }}" method="post" class="d-inline">
              @method('get')
              @csrf
              <button class="badge bg-success border-0" onclick="return confirm ('Selesaikan Tiket?')">
              <span data-feather="check" class="align-text-bottom"></span>
              </button>
              </form>

            <form action="/dashboard/sales/{{ $sale->id }}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button class="badge bg-danger border-0" onclick="return confirm ('Apakah Anda Yakin Ingin Mengahpus Postingan?')">
              <span data-feather="x-circle" class="align-text-bottom"></span>
              </button>
              </form>
            @endif
            </td>
          </tr>
          @elseif($sale->status == "Process")
          @endif
          @endforeach
          </tbody>
        </table>
      </div>

      <!-- <script>
        $(".filter").on('cange', function() {
          console.log("FILTER")
          
        })
      </script> -->
@endsection
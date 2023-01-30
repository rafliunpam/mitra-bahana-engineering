@extends('dashboard.layouts.main')
@section('container')
<div class="breadcrumbs">
                <div class="col-sm-6">
                    <div class="page-header float-left">
                        <div class="page-title text-center mt-2">
                            <h3>Konfirmasi Tiket Sales</h3>
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

      <div class="content mt-3">
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title">
                                        Permintaan
                                    </strong>
                                </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No. Tiket Sales</th>
                                            <th>Tim Sales</th>
                                            <th>Client</th>
                                            <th>Keterangan</th>
                                            <th>File</th>
                                            <th>Tanggal Update</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($sales as $sale)
          @if($sale->status == "Success")
          <tr>
            <td>{{ $sale->no_tiket_sales }}</td>
            <td>{{ $sale->user->employee->name }}</td>
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
            
            <td>
            @if($sale->file !== NULL)
                <a href="/storage/{{ $sale->file }}" class="badge badge-info"><span data-feather="file-text" class="fa fa-download"></span> Download</a></td>
                @else
                <label for="" class="badge badge-secondary">Not Uploaded</label>
                @endif
            </td>
            <td>{{ $sale->updated_at }}</td>

            <td>
            <form action="/dashboard/sales/saleDone/{{ $sale->id }}" method="post" class="d-inline">
              @method('post')
              @csrf
              <button class="btn btn-success badge badge-primary fa fa-check border-0 mb-2 mt-2" onclick="return confirm ('Konfirmasi, untuk membatalkan tiket sales No. Tiket : {{ $sale->no_tiket_sales }} Client : {{ $sale->client->company_name }}?')">
              <span class=" badge">Accept</span></button>
              </form>

              <form action="/dashboard/sales/{{ $sale->id }}/process" method="post" class="d-inline">
              @method('post')
              @csrf
              <button class="btn btn-danger badge badge-danger fa fa-check border-0 mb-2 mt-2" onclick="return confirm ('Menolak, Penyelesaian tiket No : {{ $sale->no_tiket_sales }} Tim Sales : {{ $sale->user->employee->name }}?')">
              <span class=" badge">Reject</span></button>
              </form>
            </td>
            @else
            @endif
          @endforeach
          </tbody>
        </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

</div>
@endsection
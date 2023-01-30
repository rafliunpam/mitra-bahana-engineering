@extends('dashboard.layouts.main')
@section('container')
<div class="breadcrumbs">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title text-center mt-2">
                            <h3>Tiket Sales</h3>
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
                                @cannot('tim_sales')
                                <div class="card-header">
                                    <strong class="card-title">
                                        <a href="/dashboard/sales/create" class="btn btn-primary fa fa-plus-square"> Create New</a>
                                    </strong>
                                </div>
                                @endcannot
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No. Tiket Sales</th>
                                            <th>Tim Sales</th>
                                            <th>Client</th>
                                            <th>Keterangan</th>
                                            <th class="text-center">Status</th>
                                            <th>File</th>
                                            <th>Tanggal Update</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sales as $sale)
                                        @if ($sale->status !== 'Cancle' )
                                        <tr>
                                            <td>{{ $sale->no_tiket_sales }}</td>
                                            <td>{{ $sale->user->employee->name }}</td>
                                            <td>{{ $sale->client->company_name}}</td>
                                            <td>{{ $sale->keterangan}}</td>

                                            <td class="text-center">
                                                @if($sale->status == "Unprocessed")
                                                <label class="label badge badge-danger text-white">{{ $sale->status}}</label>
                                                @elseif($sale->status == "Process")
                                                <label class="label badge badge-warning text-white">{{ $sale->status}}</label>
                                                @elseif($sale->status == "Success")
                                                <label class="label badge badge-success text-white">{{ $sale->status}}</label>
                                                @elseif($sale->status == "Pending")
                                                <label class="label badge badge-dark text-white">{{ $sale->status}}</label>
                                                @endif
                                            </td>

                                            <td>
                                                @if($sale->file !== NULL)
                                                <a href="/storage/{{ $sale->file }}" class="badge badge-info"><span data-feather="file-text" class="fa fa-download"></span> Download</a></td>
                                                @else
                                                <label for="" class="badge badge-secondary">Not Uploaded</label>
                                                @endif
                                            </td>

                                            <td>{{ $sale->updated_at }}</td>

                                            <td>
                                            @if($sale->status == "Unprocessed")
                                                <form action="/dashboard/sales/{{ $sale->id }}/process" method="post" class="d-inline">
                                                @method('post')
                                                @csrf
                                                <button class="btn btn-danger badge badge-warning fa fa-play-circle border-0" onclick="return confirm ('Proses Tiket Sales No : {{ $sale->no_tiket_sales }} Client : {{ $sale->client->company_name }} ?')">
                                                <span class=" badge">Process</span>
                                                </button></form>
                                                
                                            @elseif($sale->status == "Process")
                                                @if($sale->file !== NULL)
                                                @if($sale->keterangan !== NULL)
                                                <form action="/dashboard/sales/{{ $sale->id }}/process" method="post" class="d-inline">
                                                @method('post')
                                                @csrf
                                                <button class="btn btn-success badge badge-primary fa fa-check border-0 mb-2 mt-2" onclick="return confirm ('Non-Aktifkan NIK : {{ $sale->id }} ?')">
                                                <span class=" badge">Success</span></button>
                                                </form>
                                                @else
                                                @endif
                                                @endif
                                            
                                            <form action="/dashboard/sales/edit/{{ $sale->id }}" method="post" class="d-inline">
                                            @method('post')
                                            @csrf
                                            <button class="btn btn-light badge badge-dark fa fa-edit border-0 mb-2" onclick="return confirm ('Update Tiket Sales No : {{ $sale->no_tiket_sales }} Client : {{ $sale->client->company_name }} ?')">
                                            <span class=" badge">Update</span></button>
                                            </form>

                                            <!-- <form action="/dashboard/sales/cancle/{{ $sale->id }}" method="post" class="d-inline">
                                            @method('post')
                                            @csrf
                                            <button class="btn btn-warning badge badge-danger fa fa-exclamation-triangle border-0" onclick="return confirm ('Cancle Tiket Sales No : {{ $sale->no_tiket_sales }} Client : {{ $sale->client->company_name }} ?')">
                                            <span class=" badge">Cancle</span></button>
                                            </form> -->

                                            @elseif($sale->status == "Success")
                                            <button class=" btn btn-light badge badge-dark border-0 fa fa-spinner" onclick="return confirm ('Menunggu Konfirmasi Dari Manajer!')"> Waiting
                                            </button>

                                            @elseif($sale->status =="Pending")
                                            <form action="/dashboard/sales/cancle/{{ $sale->id }}/acc" method="post" class="d-inline">
                                            @method('post')
                                            @csrf
                                            <button class="btn btn-success badge badge-primary fa fa-check border-0 mb-2 mt-2" onclick="return confirm ('Konfirmasi, untuk membatalkan tiket sales No. Tiket : {{ $sale->no_tiket_sales }} Client : {{ $sale->client->company_name }}?')">
                                            <span class=" badge">Accept</span></button>
                                            </form>

                                            <form action="/dashboard/sales/cancle/{{ $sale->id }}" method="post" class="d-inline">
                                            @method('put')
                                            @csrf
                                            <button class="btn btn-danger badge badge-danger fa fa-check border-0 mb-2 mt-2" onclick="return confirm ('Menolak, Pembatalan tiket No : {{ $sale->no_tiket_sales }} Tim Sales : {{ $sale->user->employee->name }}?')">
                                            <span class=" badge">Reject</span></button>
                                            </form>

                                            @endif
                                            </td>
                                        </tr>
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
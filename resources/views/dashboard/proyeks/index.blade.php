@extends('dashboard.layouts.main')
@section('container')
<div class="breadcrumbs">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title text-center mt-2">
                            <h3>Tiket Proyek</h3>
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
<!-- @cannot('tim_sales')
        <a href="/dashboard/sales/create" class="btn btn-primary mb-3">Create New Tiket</a>
  @endcannot -->

  
  <div class="content mt-3">
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-md-12">
                        @if ($p > '0')
                            <div class="card">
                                @cannot('tim_proyek')
                                <div class="card-header">
                                    <strong class="card-title">
                                    
                                        <a href="/dashboard/proyeks/create" class="btn btn-primary fa fa-plus-square"> Create New <span class="count badge badge-light">{{$p}}</span></a>
                                    </strong>
                                </div>
                                @endcannot                                
                                    @else
                                    @endif
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Kode Proyek</th>
                                        <th scope="col">Client</th>
                                        <th scope="col">Tim Proyek</th>
                                        <th scope="col">Nama Proyek</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">File SPK</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($proyeks as $proyek)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $proyek->no_tiket_proyek }}</td>
                                        <td>{{ $proyek->donesale->sale->client->company_name }}</td>
                                        <td>{{ $proyek->user->employee->name}}</td>
                                        <td>{{ $proyek->title }}</td>
                                        <td class="text-center">
                                                @if($proyek->status == "Unprocessed")
                                                <label class="label badge badge-danger text-white">{{ $proyek->status}}</label>
                                                @elseif($proyek->status == "Process")
                                                <label class="label badge badge-warning text-white">{{ $proyek->status}}</label>
                                                @elseif($proyek->status == "Success")
                                                <label class="label badge badge-success text-white">{{ $proyek->status}}</label>
                                                @elseif($proyek->status == "Pending")
                                                <label class="label badge badge-dark text-white">{{ $proyek->status}}</label>
                                                @endif
                                            </td>
                                        <td>
                                        @if($proyek->file !== NULL)
                                        <a href="/storage/{{ $proyek->file }}" class="badge badge-info"><span data-feather="file-text" class="fa fa-download"></span> Download</a></td>
                                        @else
                                        <label for="" class="badge badge-secondary">Not Uploaded</label>
                                        @endif
                                        <td>
                                        @if($proyek->status == "Unprocessed")
                                        <form action="/dashboard/proyeks/{{ $proyek->id }}/status" method="post" class="d-inline">
                                            @method('put')
                                            @csrf
                                            <button class="btn btn-danger badge badge-warning fa fa-play-circle border-0" onclick="return confirm ('Proses Tiket Sales No : {{ $proyek->no_tiket_proyek }} Client : {{ $proyek->donesale->sale->client->company_name }} ?')">
                                            <span class=" badge">Process</span>
                                            </button>
                                        </form>

                                        @elseif($proyek->status == "Process")
                                        <form action="/dashboard/proyeks/{{ $proyek->no_tiket_proyek }}/update" method="post" class="d-inline">
                                            @method('get')
                                            @csrf
                                            <button class="btn btn-light badge badge-dark fa fa-edit border-0 mb-2" onclick="return confirm ('Update Tiket Sales No : {{ $proyek->no_tiket_proyek }} Client : {{ $proyek->donesale->sale->client->company_name }}')">
                                            <span class=" badge">Update</span></button>
                                        </form>

                                        @elseif($proyek->status =="Success")
                                        <button class=" btn btn-light badge badge-dark border-0 fa fa-spinner" onclick="return confirm ('Menunggu Konfirmasi Dari Manajer!')"> Waiting
                                        </button>
                                        @endif
                                        </td>
                                    </tr>
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
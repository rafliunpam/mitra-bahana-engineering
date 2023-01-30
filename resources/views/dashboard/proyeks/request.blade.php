@extends('dashboard.layouts.main')
@section('container')
<div class="breadcrumbs">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title text-center mt-2">
                            <h3>Request Tiket Proyek</h3>
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
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title">
                                        <a href="/dashboard/sales/create" class="btn btn-primary fa fa-plus-square"> Create New</a>
                                    </strong>
                                </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                          <th scope="col">#</th>
                                          <th scope="col">No. Tiket Sales</th>
                                          <th scope="col">Tim Sales</th>
                                          <th scope="col">Client</th>
                                          <th scope="col" class="text-center">Status</th>
                                          <th scope="col">Tanggal</th>
                                          <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($donesales as $done)
                                      @if($done->status == "0")
                                      <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $done->sale->no_tiket_sales }}</td>
                                        <td>{{ $done->sale->user->employee->name }}</td>
                                        <td>{{ $done->sale->client->company_name }}</td>
                                        <td class="text-center">
                                        @if($done->status == "0")
                                        <label class="label bg-danger text-white">Unprocessed</label>
                                        @elseif($done->status == "1")
                                        <label class="label bg-success text-white">Process</label>
                                        @endif
                                        </td>
                                        <td>{{ $done->created_at}}</td>
                                        <td>
                                        @if($done->status == "0")
                                        <form action="/dashboard/proyekProcess/{{ $done->id }}" method="post" class="d-inline">
                                                @method('post')
                                                @csrf
                                                <button class="btn btn-danger badge badge-warning fa fa-play-circle border-0" onclick="return confirm ('Create Tiket Sales No : {{ $done->sale->no_tiket_sales }} Client : {{ $done->sale->client->company_name }} ?')">
                                                <span class=" badge">Process</span>
                                                </button></form>
                                        <a href="/dashboard/proyekProcess/{{ $done->id }}" class="badge bg-dark"><span data-feather="edit" class="align-text-bottom"></span>Create Tiket</a>
                                        @elseif($done->status == "1")
                                          <!-- <a href="/dashboard/proyekReq/{{ $done->id }}" class="badge bg-dark"><span data-feather="edit" class="align-text-bottom"></span>Create Tiket</a> -->
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
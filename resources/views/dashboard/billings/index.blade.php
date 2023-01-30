@extends('dashboard.layouts.main')
@section('container')
<div class="breadcrumbs">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title text-center mt-2">
                            <h3>Invoices</h3>
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
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title">

                                    </strong>
                                </div>             

                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Kode Proyek</th>
                                        <th scope="col">Client</th>
                                        <th scope="col">Tim Proyek</th>
                                        <th scope="col">Nama Proyek</th>

                                        <th scope="col">File SPK</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($statuses as $status)
                                    @if($status->proyek->status == 'Process')                              
                                    <tr>
                                    <td>{{ $loop->iteration }}</td>
                                        <td>{{ $status->proyek->no_tiket_proyek }}</td>
                                        <td>{{ $status->proyek->donesale->sale->client->company_name }}</td>
                                        <td>{{ $status->proyek->user->employee->name}}</td>
                                        <td>{{ $status->proyek->title }}</td>

                                        <td>
                                        @if($status->proyek->file !== NULL)
                                        <a href="/storage/{{ $status->proyek->file }}" class="badge badge-info"><span data-feather="file-text" class="fa fa-download"></span> Download</a></td>
                                        @else
                                        <label for="" class="badge badge-secondary">Not Uploaded</label>
                                        @endif
                                        <td>

                                        <!-- <form action="/dashboard/invoices/{{ $status->proyek->no_tiket_proyek }}/detail" method="post" class="d-inline">
                                            @method('get')
                                            @csrf
                                            <button class="btn btn-light badge badge-primary fa fa-eye border-0 mb-2" onclick="return confirm ('Create Invoice?')">
                                            <span class=" badge">Detail</span></button>
                                        </form> -->

                                        @if($status->count > '0')

                                        <form action="/dashboard/invoices/{{ $status->proyek->no_tiket_proyek }}/upload" method="post" class="d-inline">
                                            @method('get')
                                            @csrf
                                            <button class="btn btn-light badge badge-dark fa fa-edit border-0 mb-2" onclick="return confirm ('Create Invoice?')">
                                            <span class=" badge">Upload Invoice</span>
                                            <span class="count badge badge-light">{{$status->count}}</span></button>
                                        </form>
                                        @endif
                                        
                                        </td>
                                    </tr>
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
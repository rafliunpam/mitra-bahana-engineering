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
                            <div class="card">
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title">
                                    
                                        <a href="/dashboard/billings/create" class="btn btn-primary fa fa-plus-square"> Create New</a>
                                    </strong>
                                </div>             

                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Nama Proyek</th>
                                        <th scope="col">Nomor Tiket</th>
                                        <th scope="col">Client</th>
                                        <th scope="col">Persentase</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($billings as $billing)                                
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $billing->proyek->title}}</td>
                                        <td>{{ $billing->proyek->no_tiket_proyek}}</td>
                                        <td>{{ $billing->proyek->donesale->sale->client->company_name }}</td>
                                        <td>{{ $billing->persentase }}%</td>
                                        <td>
                                        <form action="/dashboard/billings/{{ $billing->id }}/detail" method="post" class="d-inline">
                                            @method('get')
                                            @csrf
                                            <button class="btn btn-light badge badge-dark fa fa-eye border-0 mb-2">
                                            <span class=" badge">Detail</span></button>
                                        </form>
                                        <form action="/dashboard/billings/create/{{ $billing->id }}" method="post" class="d-inline">
                                            @method('get')
                                            @csrf
                                            <button class="btn btn-light badge badge-dark fa fa-edit border-0 mb-2">
                                            <span class=" badge">Create Invoice</span></button>
                                        </form>
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
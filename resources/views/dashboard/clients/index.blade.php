@extends('dashboard.layouts.main')
@section('container')
<div class="breadcrumbs">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title text-center mt-2">
                            <h3>Data Client</h3>
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
            @endif
                </div>
            </div>

      <div class="content mt-3">
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title"
                                        ><a href="/dashboard/clients/create" class="btn btn-primary fa fa-plus-square"> Create New</a></strong
                                    >
                                </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Kode Client</th>
                                            <th>Name</th>
                                            <th>Kota</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($clients as $client)
                                        <tr>
                                          <td>{{ $loop->iteration }}</td>
                                          <td>{{ $client->kode_client }}</td>
                                          <td>{{ $client->company_name }}</td>
                                          <td>{{ $client->kota }}</td>
                                          <td class="text-center">
                                            <a href="/dashboard/clients/{{ $client->id }}" class="badge bg-info fa fa-eye text-white"><span class="align-text-bottom"></span></a>
                                            |
                                            <a href="/dashboard/clients/{{ $client->id }}/edit" class="badge bg-warning fa fa-edit text-white"><span class="align-text-bottom"></span></a>

                                            <form action="/dashboard/clients/{{ $client->id }}" method="post" class="d-inline">
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
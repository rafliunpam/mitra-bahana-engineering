@extends('dashboard.layouts.main')
@section('container')
<div class="breadcrumbs">
                <div class="col-sm-6">
                    <div class="page-header float-left">
                        <div class="page-title text-center mt-2">
                            <h3>Konfirmasi Tiket Proyek</h3>
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
            </div>      <div class="content mt-3">
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
                                      <th scope="col">No. Tiket Proyek</th>
                                      <th scope="col">Client</th>
                                      <th scope="col">Tim Proyek</th>
                                      <th scope="col">Nama Proyek</th>
                                      <!-- <th scope="col" class="text-center">Status</th> -->
                                      <th scope="col">File</th>
                                      <th scope="col">Tanggal Update</th>

                                      <th scope="col">Action</th>
                                    </tr>
                                  </thead><tbody>
                                  @foreach ($proyeks as $proyek)
                                  <tr>
                                    <td>{{ $proyek->no_tiket_proyek }}</td>
                                    <td>{{ $proyek->donesale->sale->client->company_name}}</td>
                                    <td>{{ $proyek->user->employee->name }}</td>
                                    <td>{{ $proyek->title }}</td>                                    
                                    <td>
                                    @if($proyek->file !== NULL)
                                        <a href="/storage/{{ $proyek->file }}" class="badge badge-info"><span data-feather="file-text" class="fa fa-download"></span> Download</a></td>
                                        @else
                                        <label for="" class="badge badge-secondary">Not Uploaded</label>
                                        @endif
                                    </td>
                                    <td>{{ $proyek->updated_at }}</td>
                                    <td class="text-center">
                                    <form action="/dashboard/proyek/statusAcc/{{$proyek->no_tiket_proyek}}" method="post" class="d-inline">
                                        @method('get')
                                        @csrf
                                        <button class="btn btn-primary badge badge-success fa fa-bell-o border-0" onclick="return confirm ('Konfirmasi?')">
                                            <span class=" badge">Preview</span></button>
                                    </form>                                    
                                    </td>
                                </tr>                                                        
                                  @endforeach
                                <tr>
                                    @foreach ($statuses as $status)
                                    @if($status->status == 'Success')
                                        <td>{{ $status->proyek->no_tiket_proyek }}</td>
                                        <td>{{ $status->proyek->donesale->sale->client->company_name}}</td>
                                        <td>{{ $status->proyek->user->employee->name }}</td>
                                        <td>{{ $status->proyek->title }}</td>
                                        <td>
                                            @if($status->proyek->file !== NULL)
                                                <a href="/storage/{{ $status->proyek->file }}" class="badge badge-info"><span data-feather="file-text" class="fa fa-download"></span> Download</a></td>
                                                @else
                                                <label for="" class="badge badge-secondary">Not Uploaded</label>
                                                @endif
                                            </td>
                                        <td>{{ $status->proyek->updated_at }}</td>
                                        <td class="text-center">
                                            <form action="/dashboard/proyek/statusAcc/{{$status->proyek->no_tiket_proyek}}" method="post" class="d-inline">
                                                @method('get')
                                                @csrf
                                                <button class="btn btn-primary badge badge-warning fa fa-bell-o border-0" onclick="return confirm ('Konfirmasi?')">
                                                    <span class=" badge">Preview</span></button>
                                            </form>                                    
                                        </td>
                                    @endif
                                </tr>
                                    @endforeach 
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>

@endsection
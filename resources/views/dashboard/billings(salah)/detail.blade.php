@extends('dashboard.layouts.main')

@section('container')
<div class="breadcrumbs">
                <div class="col-sm-8">
                    <div class="page-header float-left">
                        <div class="page-title text-center mt-2">
                            <h3>Detail {{$billing->proyek->title}}</h3>
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

            <div class="col-lg-12">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header"><strong>Update Tiket Proyek</strong><small></small>
                    <div class="card-body card-block">

                        <div class="mb-3">

                        </div>
                        <table class="table table-striped table-sm">
                          <thead>
                              <tr>
                              <th scope="col">No Tiket Proyek</th>
                              <th scope="col">Client</th>
                              <th scope="col">Tim Proyek</th>
                              </tr>
                          </thead>
                          <tbody>
                          <tr>
                              <td>
                              <input type="text" class="form-control bg-white" id="no_tiket_proyek" name="no_tiket_proyek" value="{{ $billing->proyek->no_tiket_proyek }}" readonly>
                              </td>
                              <td>
                              <input type="text" class="form-control bg-white" id="client" name="client" value="{{ $billing->proyek->donesale->sale->client->company_name }}" readonly>
                              </td>
                              <td>
                              <input type="text" class="form-control bg-white" id="client" name="client" value="{{ $billing->proyek->user->employee->name }}" readonly>
                              </td>
                              <tr></tr>
                          </tr>
                          </tbody>
                        </table>
                          
                        <div class="mb-3">
                          <table class="table table-striped table-sm">
                            <thead>
                              <tr>
                                <th scope="col">Tahapan</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col" class="text-center">Status</th>
                                <th scope="col" class="text-center">File</th>
                                <th scope="col" class="text-center">Tanggal</th>
                                <th scope="col" class="text-center">Action</th>

                              </tr>
                            </thead>
                            <tbody>
                            <tr>
                            @foreach ($statuses as $status)
                              <td>{{ $status->tahapan }}</td>
                              <td>{{ $status->keterangan }}</td>
                              <td class="text-center">
                              </td>
                              <td class="text-center">
                              </td>
                              <td class="text-center">
                                  {{ $status->updated_at }}
                              </td>


                              <td class="text-center">
                               
                              </td>


                            </tr>                            
                            </tbody>
                            @endforeach
                          </table>
                        </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
@endsection
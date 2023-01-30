@extends('dashboard.layouts.main')
@section('container')
<div class="breadcrumbs">
                <div class="col-sm-12">
                    <div class="page-header float-left">
                        <div class="page-title text-center mt-2">
                            <h3>{{$proyek->title}}</h3>
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
                              <input type="text" class="form-control bg-white" id="no_tiket_proyek" name="no_tiket_proyek" value="{{ $proyek->no_tiket_proyek }}" readonly>
                              </td>
                              <td>
                              <input type="text" class="form-control bg-white" id="client" name="client" value="{{ $proyek->donesale->sale->client->company_name }}" readonly>
                              </td>
                              <td>
                              <input type="text" class="form-control bg-white" id="client" name="client" value="{{ $proyek->user->employee->name }}" readonly>
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
                              @if($status->status == "Unprocessed")
                                  <label class="label badge badge-danger text-white">{{ $status->status}}</label>
                                  @elseif($status->status == "Process")
                                  <label class="label badge badge-warning text-white">{{ $status->status}}</label>
                                  @elseif($status->status == "Success")
                                  <label class="label badge badge-success text-white">{{ $status->status}}</label>
                                  @elseif($status->status == "Done")
                                  <label class="label badge badge-primary text-white">{{ $status->status}}</label>
                                  @elseif($status->status == "Solved")
                                  <label class="label badge badge-dark text-white">{{ $status->status}}</label>
                                  @endif
                              </td>
                              <td class="text-center">
                              @if($status->file !== NULL)
                              <a href="/storage/{{ $status->file }}" class="badge badge-info"><span data-feather="file-text" class="fa fa-download"></span> Download</a></td>
                              @else($status->file == NULL)
                              <label for="" class="badge badge-secondary">Not Uploaded</label>
                              @endif
                              </td>
                              <td class="text-center">
                                  {{ $status->updated_at }}
                              </td>


                              <td class="text-center">
                                @if($status->status == "Unprocessed")
                                  <!-- <a href="/dashboard/proyeks/statuses/{{ $status->id }}/status" class="badge bg-warning"><span data-feather="edit" class="align-text-bottom"></span>Process</a> -->
                                  <form action="/dashboard/proyeks/statuses/{{ $status->id }}/status" method="post" class="d-inline">
                                            @method('post')
                                            @csrf
                                            <button class="btn btn-danger badge badge-warning fa fa-play-circle border-0" onclick="return confirm ('Proses Tiket Sales No : Client : ?')">
                                            <span class=" badge">Process</span>
                                            </button>
                                  </form>

                                @elseif($status->status == "Process")
                                  <!-- <a href="/dashboard/proyeks/statuses/{{ $status->id }}/edit" class="badge bg-dark"><span data-feather="edit" class="align-text-bottom"></span>Update</a> -->
                                  <form action="/dashboard/proyeks/statuses/{{ $status->id }}/edit" method="post" class="d-inline">
                                            @method('post')
                                            @csrf
                                            <button class="btn btn-light badge badge-dark fa fa-edit border-0 mb-2" onclick="return confirm ('Update Tiket Sales No : {{ $proyek->no_tiket_proyek }} Client : {{ $proyek->donesale->sale->client->company_name }}')">
                                            <span class=" badge">Update</span></button>
                                            </button>
                                  </form>

                                  
                                  <!-- <a href="/dashboard/status/{{ $status->id }}" class="badge bg-success"><span data-feather="check" class="align-text-bottom"></span>Success</a> -->
                                @elseif($status->status == "Success")
                                <button class=" btn btn-light badge badge-light border-0 fa fa-spinner" onclick="return confirm ('Menunggu Konfirmasi Dari Manajer!')"> Waiting</button>
                                
                                @elseif($status->status == "Done")
                                <label class="badge badge-primary fa fa-check"><span data-feather="check" class="align-text-bottom"></span></label>
                                  </button>
                                
                                @elseif($status->status == "Solved")
                                <label class="badge badge-dark fa fa-check"><span data-feather="check" class="align-text-bottom"></span></label>
                                  </button>
                                @endif
                              </td>


                            </tr>                            
                            </tbody>
                            @endforeach
                          </table>
                        </div>
                        <div class="mb-3">
                          <a href="/dashboard/proyeks" class="btn btn-danger"><span class="align-text-center "><i class="fa fa-arrow-left"></i></span> Batal</a>                     
                        @if($status->status == "Done")

                        <form method="post" action="/dashboard/proyeks/{{$proyek->id}}/status" enctype="multipart/form-data" class="mb-5">
                        @method ('put')
                        @csrf
                          <div class="mb-3">
                            <a href="/dashboard/proyeks" class="btn btn-danger"><span class="align-text-center "><i class="fa fa-arrow-left"></i></span> Batal</a>              
                          <button type="submit" class="btn btn-primary">Selesaikan Tiket</button>                         
                          </div>
                        </form>
                        @else
                        @endif
                    </div>
                  </div>
                </div>
              </div>
              @cannot('tim_sales')
                @endcannot
            </div>
            <!-- <a href="/dashboard/proyeks/{{ $proyek->id }}" class="btn btn-white border-dark border-2" onclick="return confirm ('Selesaikan Tiket {{ $proyek->title }} ?')">Selesaikan Tiket</a> -->

@endsection
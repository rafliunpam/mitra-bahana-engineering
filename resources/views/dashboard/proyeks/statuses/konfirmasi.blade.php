@extends('dashboard.layouts.main')
@section('container')
<div class="breadcrumbs">
                <div class="col-sm-6">
                    <div class="page-header float-left">
                        <div class="page-title text-center mt-2">
                            <h3>{{ $proyek->title }}</h3>
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
                                        No. Tiket : {{ $proyek->no_tiket_proyek }} <br>
                                        Tim Proyek : {{ $proyek->user->employee->name }}
                                    </strong>
                                    @if($proyek->status == "Success")
                                    <form action="/dashboard/proyekDone/{{ $proyek->id }}" method="post" class="d-inline">
                                        @method ('post')
                                            @csrf
                                        <button class="float-right btn btn-success badge fa fa-check" onclick="return confirm ('Konfirmasi?')"
                                        > Accept
                                        </button>
                                    </form>

                                    <form action="/dashboard/proyeks/{{ $proyek->id }}/status" method="post" class="d-inline">
                                        @method ('put')
                                            @csrf
                                        <button class="float-right btn btn-danger badge fa fa-times mr-3">
                                            Reject
                                        </button>
                                    </form>
                                    @else
                                    <span class="float-right badge badge-warning fa fa-exclamation-circle text-white">Process</span>
                                    @endif
                                </div>
                            <div class="card-body">
                                <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                      <th scope="col">Tahapan</th>
                                      <!-- <th scope="col" class="text-center">Status</th> -->
                                      <th scope="col">Keterangan</th>
                                      <th scope="col">File</th>
                                      <th scope="col">Tanggal Update</th>

                                      <th scope="col">Action</th>
                                    </tr>
                                  </thead><tbody>
                                  @foreach ($statuses as $status)
                                  
                                  <tr>
                                    <td>{{ $status->tahapan}}</td>                                    
                                    <td>{{ $status->keterangan }}</td>
                                    
                                    <td class="text-center">
                                    @if($proyek->file !== NULL)
                                        <a href="/storage/{{ $status->file }}" class="badge badge-info"><span data-feather="file-text" class="fa fa-download"></span> Download</a></td>
                                        @else
                                        <label for="" class="badge badge-secondary">Not Uploaded</label>
                                        @endif
                                    </td>

                                    <td>{{ $status->updated_at }}</td>

                                    <td class=" text-center">
                                    @if($status->status == "Process")
                                    <span class="badge badge-warning text-white">Process</span>

                                    @elseif($status->status == "Done")
                                    <label class="badge badge-primary fa fa-check"><span data-feather="check" class="align-text-bottom"></span></label>

                                    @elseif($status->status == "Solved")
                                    <label class="badge badge-primary fa fa-check"><span data-feather="check" class="align-text-bottom"></span></label>

                                    @elseif($status->status == "Success")
                                    <form action="/dashboard/proyeks/statuses/{{ $status->id }}/statusAcc" method="post" class="d-inline">
                                    @method ('post')
                                        @csrf
                                        <button class="btn btn-primary badge badge-success fa fa-check border-0 mb-2 mt-2" onclick="return confirm ('Konfirmasi?')">
                                        <span class=" badge">Accept</span></button>
                                     </form>

                                    <form action="/dashboard/proyeks/statuses/{{ $status->id }}/status" method="post" class="d-inline">
                                    @method ('post')
                                        @csrf
                                        <button class="btn btn-danger badge badge-danger fa fa-times border-0 mb-2 mt-2" onclick="return confirm ('Menolak?')">
                                        <span class=" badge">Reject</span></button>
                                    </form>
                                    
                                    <!-- <a href="/dashboard/proyeks/statuses/{{ $status->id }}" class="badge bg-primary"><span data-feather="check" class="align-text-bottom" onclick="return confirm ('Confirm?')"></span>Done</a> -->
                                    @endif
                                    </td>
                                  @endforeach
                                  </tbody>
                                </table>
                                <div class="mb-3">
                          <a href="/dashboard/proyekAcc" class="btn btn-danger"><span class="align-text-center "><i class="fa fa-arrow-left"></i></span> Batal</a>                     
                         
                        </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>


@endsection
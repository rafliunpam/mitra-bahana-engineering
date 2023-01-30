@extends('dashboard.layouts.main')
@section('container')
<div class="breadcrumbs">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title text-center mt-2">
                            <h3>Data User</h3>
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
                                <div class="card-header">
                                    <strong class="card-title">
                                    </strong>
                                    <a href="/dashboard/create/user" class="btn btn-primary fa fa-plus-square"> Create New</a></strong
                                    >
                                </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th class="text-center">Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                          <td>{{ $user->nik }}</td>
                                          <td>{{ $user->employee->name}}</td>

                                          <td class="text-center">                                          
                                            @if($user->status == "1")
                                            <label class=" badge label bg-success text-white">Active</label>
                                            @else($user->status == "0")
                                            <label class=" badge label bg-danger text-white">Non-Active</label>
                                            @endif
                                          </td>
                                          
                                          <td class=" text-center ">
                                            <a href="/dashboard/users/{{ $user->id }}/edit" class="btn badge border-0 bg-dark fa fa-edit text-white"><span class="align-text-bottom"></span></a>
                                            
                                            @if($user->id !== auth()->user()->id )
                                            | 
                                             <form action="/dashboard/users/{{ $user->id }}" method="post" class="d-inline">
                                            @method('post')
                                            @csrf
                                            @if($user->status == "1")
                                            
                                            <button class="btn btn-danger badge badge-warning text-white fa fa-times border-0" onclick="return confirm ('Non-Aktifkan NIK : {{ $user->nik }} Nama : {{ $user->employee->name }}?')">
                                            <span class="align-text-bottom badge"></span>
                                            </button>
                                            @elseif($user->status == "0")
                                            <button class="btn btn-success badge badge-primary text-white fa fa-check border-0" onclick="return confirm ('Aktifkan Karyawan  NIK : {{ $user->nik }} Nama : {{ $user->employee->name }}?')">
                                            <span class="align-text-bottom badge"></span>
                                            </button>
                                            </form>
                                            @endif
                                            @else
                                            @endif

                                            <form action="/dashboard/users/{{ $user->id }}" method="post" class="d-inline">
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
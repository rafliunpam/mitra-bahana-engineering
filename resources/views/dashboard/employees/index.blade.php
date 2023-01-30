@extends('dashboard.layouts.main')
@section('container')
<div class="breadcrumbs">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title text-center mt-2">
                            <h3>Data Karyawan</h3>
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
            @elseif(session()->has('error'))
            <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                    <span class="badge badge-pill badge-danger">Erorr</span> {{ session ('error') }}
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
                                        ><a href="/dashboard/employees/create" class="btn btn-primary fa fa-plus-square"> Create New</a></strong
                                    >
                                </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Jabatan</th>
                                            <th class="text-center">User</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($employees as $employee)
                                        <tr>
                                          <td>{{ $loop->iteration }}</td>
                                          <td>{{ $employee->nik }}</td>
                                          <td>{{ $employee->name }}</td>
                                          <td>{{ $employee->jabatan }}</td>
                                          <td class = "text-center">
                                          @if($employee->user == "0")
                                            <label class="badge badge-danger">
                                            <span class="align-text-bottom"></span>Not Yet</label>
                                            @else
                                            <label class="badge badge-primary">
                                            <span class="align-text-bottom"></span>Already</label>
                                            @endif
                                          </td>
                                          <td class=" text-center ">
                                            <a href="/dashboard/employees/{{ $employee->id }}" class=" btn btn-info badge bg-info fa fa-eye text-white border-0"><span class="align-text-bottom"></span></a>
                                             | 
                                            <a href="/dashboard/employees/{{ $employee->id }}/edit" class="btn btn-dark badge bg-dark fa fa-edit text-white border-0"><span class="align-text-bottom"></span></a>
                                            @if($employee->user == "0")
                                            |
                                            <a href="/dashboard/create/user" class="btn btn-warning badge bg-warning fa fa-user text-white border-0"><span class="align-text-bottom"></span></a>
                                            <!-- <form action="/dashboard/create/user/{{ $employee->nik }}" method="post" class="d-inline">
                                            @method('post')
                                            @csrf
                                                <button class="btn btn-success badge badge-warning text-white fa fa-user border-0" onclick="return confirm ('Apakah Anda ingin membuat user dengan NIK : {{ $employee->nik }} Nama : {{ $employee->name }} ?')">
                                                <span class="align-text-bottom badge"></span>
                                                </button>
                                            </form> -->
                                            @else
                                            @endif

                                            <form action="/dashboard/employees/{{ $employee->id }}" method="post" class="d-inline">
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
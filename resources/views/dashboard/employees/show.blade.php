@extends('dashboard.layouts.main')
@section('container')
<div class="breadcrumbs">
                <div class="col-sm-8">
                    <div class="page-header float-left">
                        <div class="page-title text-center mt-2">
                            <h3>Detail Data Karyawan</h3>
                        </div>
                        <strong>{{ $employee->name }}</strong>
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
                    <div class="col-md-8">
                    <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                        <a href="/dashboard/employees" class="btn btn-success"><span class="align-text-center fa fa-arrow-left"></span> Back</a>
                        <a href="/dashboard/employees/{{ $employee->id }}/edit" class="btn btn-warning"><span class="align-text-center fa fa-edit"></span>Edit</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th colspan="2" class="text-center bg-dark text-white">{{ $employee->nik }}</th>
                            </tr>
                            <tr>
                                <th  class="col-4">Nama</th>
                                <td>{{ $employee->name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $employee->email }}</td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td>{{ $employee->jenis_kelamin }}</td>
                            </tr>
                            <tr>
                                <th>Tempat, Tanggal Lahir</th>
                                <td>{{ $employee->tempat_lahir }}, {{ $employee->tanggal_lahir }}</td>
                            </tr>
                            <tr>
                                <th>Agama</th>
                                <td>{{ $employee->agama }}</td>
                            </tr>
                            <tr>
                                <th>No. Telepon</th>
                                <td>{{ $employee->no_tlp }}</td>
                            </tr>
                            <tr>
                                <th>Alamat Domisili</th>
                                <td>{{ $employee->alamat_domisili }}</td>
                            </tr>
                            <tr>
                                <th>Alamat KTP</th>
                                <td>{{ $employee->alamat_ktp }}</td>
                            </tr>
                            <tr>
                                <th>File Pendukung</th>
                                <td>@if($employee->file !== NULL)
                                        <a href="/storage/{{ $employee->file }}" class="badge badge-info"><span data-feather="file-text" class="fa fa-download"></span> Download</a></td>
                                        @else
                                        <label for="" class="badge badge-secondary">Not Uploaded</label>
                                        @endif</td>
                            </tr>
                        </table>
                    </div>
                    </div>

    <!-- <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">
                                    NIK : {{ $employee->nik }}
                                </strong>
                                <div class="float-right">
                                <a href="/dashboard/employees" class="btn btn-success"><span class="align-text-center fa fa-arrow-left"></span> Back</a>
                                <a href="/dashboard/employees/{{ $employee->id }}/edit" class="btn btn-warning"><span class="align-text-center fa fa-edit"></span>Edit</a>
                                </div>
                            </div>
                        <div class="card-body">
                            <label for="textarea-input" class="col-9 col-md-6 form-control-label"><strong>Email :</strong> {{ $employee->email }}</label>
                            <label for="textarea-input" class="col-9 col-md-6 form-control-label"><strong>Jenis Kelamin :</strong> {{ $employee->jenis_kelamin }}</label>
                            <label for="textarea-input" class="col-9 col-md-6 form-control-label"><strong>Tempat, Tgl Lahir :</strong> {{$employee->tempat_lahir}}, {{$employee->tanggal_lahir}}</label>
                            <label for="textarea-input" class="col-9 col-md-6 form-control-label"><strong>Agama :</strong> {{ $employee->agama }}</label>
                            <label for="textarea-input" class="col-9 col-md-6 form-control-label"><strong>Nomor Telepone :</strong> {{ $employee->no_tlp }}</label>
                            <label for="textarea-input" class="col-9 col-md-6 form-control-label"><strong>Pendidikan :</strong> {{ $employee->pendidikan }}</label>
                            <label for="textarea-input" class="col-9 col-md-6 form-control-label"><strong>Jabatan :</strong> {{ $employee->jabatan }}</label>
                            <label for="textarea-input" class="col-9 col-md-6 form-control-label"><strong>Alamat KTP :</strong><br> {{ $employee->alamat_ktp }}</label>
                            <label for="textarea-input" class="col-9 col-md-6 form-control-label"><strong>Alamat Domisili :</strong><br> {{ $employee->alamat_domisili }}</label>
                        </div>
                    </div>
                </div> -->


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
    </div>
@endsection
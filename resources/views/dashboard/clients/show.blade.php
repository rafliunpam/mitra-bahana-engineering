@extends('dashboard.layouts.main')
@section('container')
<div class="breadcrumbs">
                <div class="col-sm-8">
                    <div class="page-header float-left">
                        <div class="page-title text-center mt-2">
                            <h3>{{ $client->company_name }}</h3>
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
                    <div class="col-md-8">
                    <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                        <a href="/dashboard/clients" class="btn btn-success"><span class="align-text-center fa fa-arrow-left"></span> Back</a>
                        <a href="/dashboard/clients/{{ $client->id }}/edit" class="btn btn-warning"><span class="align-text-center fa fa-edit"></span>Edit</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th colspan="2" class="text-center bg-dark text-white">{{ $client->kode_client }}</th>
                            </tr>
                            <tr>
                                <th  class="col-4">Company Name</th>
                                <td>{{ $client->company_name }}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>{{ $client->alamat }}</td>
                            </tr>
                            <tr>
                                <th>Contact Person</th>
                                <td>{{ $client->contact_person }}</td>
                            </tr>
                            <tr>
                                <th>Jabatan CP</th>
                                <td>{{ $client->jabatan_cp }}</td>
                            </tr>
                            <tr>
                                <th>Kota</th>
                                <td>{{ $client->kota }}</td>
                            </tr>
                            <tr>
                                <th>No. Telepon</th>
                                <td>{{ $client->no_tlp }}</td>
                            </tr>
                        </table>
                    </div>
                    </div>

                        <!-- <div class="card">
                            <div class="card-header">
                                <strong class="card-title">
                                    Kode Client : {{ $client->kode_client }}
                                </strong>
                                <div class="float-right">
                                <a href="/dashboard/clients" class="btn btn-success"><span class="align-text-center fa fa-arrow-left"></span> Back</a>
                                <a href="/dashboard/clients/{{ $client->id }}/edit" class="btn btn-warning"><span class="align-text-center fa fa-edit"></span>Edit</a>
                                </div>
                            </div>
                        <div class="card-body">
                            <label for="textarea-input" class="col-9 col-md-6 form-control-label"><strong>Contact Person :</strong> {{ $client->contact_person }}</label>
                            <label for="textarea-input" class="col-9 col-md-6 form-control-label"><strong>Jabatan :</strong> {{ $client->jabatan_cp }}</label>
                            <label for="textarea-input" class="col-9 col-md-6 form-control-label"><strong>Kota :</strong> {{ $client->kota }}</label>
                            <label for="textarea-input" class="col-9 col-md-6 form-control-label"><strong>Nomor Telepone :</strong> {{ $client->no_tlp }}</label>
                            <label for="textarea-input" class="col-9 col-md-6 form-control-label"><strong>Alamat</strong><br>{{ $client->alamat }}</label>
                        </div>
                    </div>
                </div> -->


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
    </div>
@endsection
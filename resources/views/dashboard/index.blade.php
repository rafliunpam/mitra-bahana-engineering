@extends('dashboard.layouts.main')
@section('container')
<div class="breadcrumbs">
            <div class="col-sm-6">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h3>Welcome {{ auth()->user()->employee->name }} ({{ auth()->user()->employee->jabatan }})</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Dashboard </li>
                        </ol>
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

        <!-- <div class="content mt-3">
        <div class="col-sm-12 mb-4">
        <div class="card-group">
            <div class="card col-lg-6 col-md-6 no-padding bg-flat-color-1">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-users text-light count">191</i>
                        <h5 class="text-light">Tiket Sales</h5>
                    </div>

                    <div class="h4 mb-0 text-light">
                        <span class="count">11</span>
                    </div>
                    <small class="text-light text-uppercase font-weight-bold">Unprocessed</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                    <div class="h4 mb-0 text-light mt-3">
                        <span class="count mt-3">13</span>
                    </div>
                    <small class="text-light text-uppercase font-weight-bold">Process</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                    <div class="h4 mb-0 text-light mt-3">
                        <span class="count">14</span>
                    </div>
                    <small class="text-light text-uppercase font-weight-bold">Solved</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
            <div class="card col-lg-6 col-md-6 no-padding bg-flat-color-3 ml-3">
                <div class="card-body">
                    <div class="h1 text-right mb-4">                    
                        <i class="fa fa-ticket text-light count">191</i>
                        <h5 class="text-light">Tiket Proyek</h5>
                    </div>
                    <div class="h4 mb-0 text-light">
                        <span class="count">15</span>
                    </div>
                    <small class="text-light text-uppercase font-weight-bold">Unprocessed</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                    <div class="h4 mb-0 text-light">
                        <span class="count">16</span>
                    </div>
                    <small class="text-light text-uppercase font-weight-bold">Process</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                    <div class="h4 mb-0 text-light">
                        <span class="count ">17</span>
                    </div>
                    <small class="text-light text-uppercase font-weight-bold">Solved</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                </div>
            </div>           
        </div>
        </div> -->
        <div class="content">
        <div class="col-sm-12 mb-4">
        <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th class=" text-center table-dark" scope="col">Profile Perusahaan</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="text-center">PT. Mitra Bahana Engineering merupakan perusahaan yang bergerak
                                            dibidang Perencanaan Mekanikal & Elektrikal yang dikhususkan dalam bidang
                                            Audit dan Fitting Out (Renovasi) untuk gedung - gedung bertingkat, pabrik - pabrik,
                                            pergudangan, perkantoran dan lain-lain. PT. Mitra Bahana Engineering dapat
                                            memberikan solusi terbaik dalam Perencanaan dan Audit pekerjaan Mekanikal dan
                                            Elektrikal yang bekerja sama dalam bidang pembangunan untuk menciptakan
                                            semangat kerja yang dinamis sesuai dengan karakter dan budaya bangsa Indonesia.
                                        </td>
                                    </tr>
                                    <thead>
                                        <tr>
                                            <th class=" text-center table-dark" scope="col">Visi</th>
                                        </tr>
                                        <tr>
                                    </thead>
                                        <td class="text-center">Memberikan solusi terbaik dalam Perencanaan dan Audit pekerjaan
                                        Mekanikal dan Elektrikal yang bekerja sama dalam bidang pembangunan untuk
                                        menciptakan semangat kerja yang dinamis sesuai dengan karakter dan budaya
                                        bangsa Indonesia.</td>
                                        </tr>
                                        <thead>
                                        <tr>
                                            <th class=" text-center table-dark" scope="col">Misi</th>
                                        </tr>
                                        <tr>
                                    </thead>
                                        <td class="text-center">Menjadi salah satu perusahaan swasta nasional yang memiliki reputasi
                                        setara dengan perusahaan internasional didalam mutu dan kualitas kerja.
                                        </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
        </div>
        </div>



    @endsection





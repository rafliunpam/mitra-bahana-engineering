@extends('dashboard.layouts.main')
@section('container')
<div class="breadcrumbs">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title text-center mt-2">
                            <h3>Edit</h3>
                        </div>
                    </div>
                </div>
            </div>
          
            <div class="col-lg-12">
            <div class="col-lg-8">
              <div class="card">
                <div class="card-header"><strong>User</strong><small> Form</small></div>
                    <div class="card-body card-block">
                      <form method="post" action="/dashboard/users/{{ $user->id }}" enctype="multipart/form-data" class="mb-5">
                      @method ('put')
                        @csrf
                      <div class="mb-3">
                        <label for="" class="form-label badge badge-danger">NIK </label>
                        <label class=" font-italic">(Nomor Induk Karyawan)</label>
                        <input type="text" class=" bg-white form-control @error('') is-invalid @enderror" id="" name="" required readonly value="{{ $user->nik }}">
                      </div>

                      <div class="mb-3">
                        <label for="" class="form-label badge badge-danger">Nama</label>
                        <input type="text" class="bg-white form-control @error('') is-invalid @enderror" id="" name="" required value="{{ $user->employee->name }}" readonly>
                      </div>

                      <div class="mb-3">
                      <label for="level_user" class="form-label badge badge-warning">Level User</label>
                      <select class="form-control-sm form-control" name="level_user" autofocus required>
                      <!-- <option value="{{$user->level_user}}" hidden selected>{{$user->level_user}}</option> -->
                      <option <?php if ($user->level_user == "admin") { echo 'selected'; }?> value="admin">Admin</option>
                      <option <?php if ($user->level_user == "manajer_proyek") { echo 'selected'; }?> value="manajer_proyek">Manajer Proyek</option>
                      <option <?php if ($user->level_user == "manajer_sales") { echo 'selected'; }?> value="manajer_sales">Manajer Sales</option>
                      <option <?php if ($user->level_user == "tim_proyek") { echo 'selected'; }?> value="tim_proyek">Tim Proyek</option>
                      <option <?php if ($user->level_user == "tim_sales") { echo 'selected'; }?> value="tim_sales">Tim Sales</option>
                        
                      </select>
                      </div>

                      <a href="/dashboard/users" class="btn btn-danger"><span class="align-text-center "><i class="fa fa-arrow-left"></i></span> Batal</a>
                      <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>  
                    </form>
                    <form method="post" action="/dashboard/users/{{ $user->id }}/reset" enctype="multipart/form-data" class="mb-5">
                      </div>
                      @method ('put')
                        @csrf
                    <button type="submit" class="btn btn-warning" onclick="return confirm ('Apakah yakin ingin mereset password User dengan NIK : {{ $user->nik }} Nama : {{ $user->employee->name }}?')"><i class="fa fa-refresh"></i> Reset Password</button>
                    </form>  
                    </div>
                </div>
              </div>
            </div>
@endsection
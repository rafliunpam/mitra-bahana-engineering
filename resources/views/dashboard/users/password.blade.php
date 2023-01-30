@extends('dashboard.layouts.main')
@section('container')
<div class="breadcrumbs">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title text-center mt-2">
                            <h3>Kelola Password</h3>
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
                    <span class="badge badge-pill badge-danger">Error</span> {{ session ('danger') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            @endif
                </div>
            </div>
          
            <div class="col-lg-12">
            <div class="col-lg-8">
              <div class="card">
                <div class="card-header"><strong>Ganti Password</strong><small> Form</small></div>
                    <div class="card-body card-block">
                      <form method="post" action="/dashboard/users/password" enctype="multipart/form-data" class="mb-5">
                        @method('post')
                        @csrf
                      <div class="row form-group">
                            <div class="col col-md-3"><label for="password_lama" class=" form-control-label">
                              Password Lama</label>
                            </div>
                            <div class="col-0 col-md-8">
                              <input type="password" id="password_lama" name="password_lama" class="form-control @error('password_lama') is-invalid @enderror" required>
                              <small class="help-block form-text">Please Enter Current Password</small>
                              @error ('password_lama')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                              @enderror
                            </div>
                      </div>

                      <div class="row form-group">
                            <div class="col col-md-3"><label for="password_baru" class=" form-control-label">
                              Password Baru</label>
                            </div>
                            <div class="col-12 col-md-8">
                              <input type="password" id="password_baru" name="password_baru" class="form-control @error('password_baru') is-invalid @enderror" required>
                              <small class="help-block form-text">Please enter a complex password</small>
                              @error ('password_baru')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                              @enderror
                            </div>
                      </div>

                      <a href="/dashboard" class="btn btn-danger"><span class="align-text-center "><i class="fa fa-arrow-left"></i></span> Batal</a>
                      <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>  
                    </form>
                    </div>
                    </div>
                </div>
              </div>
            </div>
@endsection
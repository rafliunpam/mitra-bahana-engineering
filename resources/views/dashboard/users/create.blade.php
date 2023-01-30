@extends('dashboard.layouts.main')
@section('container')
<div class="breadcrumbs">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title text-center mt-2">
                            <h3>Create New</h3>
                        </div>
                    </div>
                </div>
            </div>
          
            <div class="col-lg-12">
            <div class="col-lg-8">
              <div class="card">
                <div class="card-header"><strong>User</strong><small> Form</small></div>
                    <div class="card-body card-block">
                      <form method="post" action="/dashboard/user/{{ $employee->nik }}" enctype="multipart/form-data" class="mb-5">
                        @csrf
                        @if($employee->nik !== NULL)
                        
                      <div class="mb-3">
                        <label for="" class="form-label badge badge-danger">NIK </label>
                        <label class=" font-italic">(Nomor Induk Karyawan)</label>
                        <input type="text" class=" bg-white form-control @error('') is-invalid @enderror" id="" name="" required readonly value="{{ $employee->nik }}">
                      </div>

                      <div class="mb-3">
                        <label for="" class="form-label badge badge-danger">Nama</label>
                        <input type="text" class="bg-white form-control @error('') is-invalid @enderror" id="" name="" required value="{{ $employee->name }}" readonly>
                      </div>
                        @else

                        <div class="mb-3">
                      <label for="employee_id" class="form-label badge badge-primary">Nama & NIK</label>
                          <select data-placeholder="Please Select NIK / Name..." class="standardSelect" name="employee_id" id="employee_id" tabindex="1">
                          @foreach ($employees as $employee)
                          @if($employee->user == "0")
                          <option value=""></option>
                              <option value="{{$employee->id}}">{{$employee->name}} | {{$employee->nik}}</option>
                            @endif
                            @endforeach
                          </select>
                      </div>
                      @endif

                      <div class="mb-3">
                      <label for="level_user" class="form-label badge badge-warning">Level User</label>
                      <select class="form-control-sm form-control" name="level_user" autofocus required>
                      <option value="">Please Selected</option>
                      <option value="admin">Admin</option>
                        <option value="manajer_proyek">Manajer Proyek</option>
                        <option value="manajer_sales">Manajer Sales</option>
                        <option value="tim_proyek">Tim Proyek</option>
                        <option value="tim_sales">Tim Sales</option>
                      </select>
                      </div>

                      <a href="/dashboard/employees" class="btn btn-danger"><span class="align-text-center "><i class="fa fa-arrow-left"></i></span> Batal</a>
                      <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>  
                    </form>
                    </div>
                    </div>
                </div>
              </div>
            </div>
@endsection
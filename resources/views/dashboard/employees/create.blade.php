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
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header"><strong>Karyawan</strong><small> Form</small></div>
                    <div class="card-body card-block">
                      <form method="post" action="/dashboard/employees" enctype="multipart/form-data" class="mb-5">
                        @csrf                      
                      <div class="mb-3 col-lg-4">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name') }}">
                        @error ('name')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>

                      <div class="mb-3 col-lg-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required autofocus value="{{ old('email') }}">
                        @error ('email')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>

                      <div class="mb-4 col-lg-4">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <div class="col col-md-9 mb-3">
                        <div class="form-check-inline form-check">
                        <label for="jenis_kelamin" class="form-check-label ">
                                <input type="radio" id="jenis_kelamin" name="jenis_kelamin" value="Pria" class="form-check-input">Pria
                            </label>
                            <label for="jenis_kelamin" class="form-check-label ml-3">
                                <input type="radio" id="jenis_kelamin" name="jenis_kelamin" value="Wanita" class="form-check-input">Wanita
                            </label>
                        </div>
                      </div>
                        <!-- <select name="jenis_kelamin" id="jenis_kelamin" class="form-control-sm form-control">
                                <option value="0">Please select</option>
                                <option value="1">Pria</option>
                                <option value="2">Wanita</option>
                            </select> -->
                      </div>

                      <div class="mb-3 col-lg-4">
                        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                        <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" name="tempat_lahir" required autofocus value="{{ old('tempat_lahir') }}">
                        @error ('tempat_lahir')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>

                      <div class="mb-3 col-lg-4">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" required autofocus value="{{ old('tanggal_lahir') }}">
                        @error ('tanggal_lahir')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>

                      <div class="mb-4 col-lg-4">
                        <label for="agama" class="form-label">Agama</label>
                        <select name="agama" id="agama" class="form-control-sm form-control">
                                <option value="">Please select</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Budha">Budha</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Konghuchu">Konghuchu</option>
                            </select>
                      </div>

                      <div class="mb-3 col-lg-6">
                        <label for="no_tlp" class="form-label">No Telepon</label>
                        <input type="text" class="form-control @error('no_tlp') is-invalid @enderror" id="no_tlp" name="no_tlp" required autofocus value="{{ old('no_tlp') }}">
                        @error ('no_tlp')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>

                      <div class="mb-4 col-lg-6">
                        <label for="pendidikan" class="form-label">Pendidikan</label>
                        <select name="pendidikan" id="pendidikan" class="form-control-sm form-control">
                                <option value="">Please select</option>
                                <option value="SLTA - Sederajat">SLTA - Sederajat</option>
                                <option value="D3 - Diploma 3">D3 - Diploma 3</option>
                                <option value="S1 - Strata 1 (Undergraduate, Bachelor)">S1 - Strata 1 (Undergraduate, Bachelor)</option>
                                <option value="S2 - Strata 2 (Magister)">S2 - Strata 2 (Magister)</option>
                                <option value="S3 - Strata 3 (Doctoral)">S3 - Strata 3 (Doctoral)</option>
                            </select>
                      </div>
                      <!-- <div class="mb-3 col-lg-6">
                        <label for="pendidikan" class="form-label">Pendidikan</label>
                        <input type="text" class="form-control @error('pendidikan') is-invalid @enderror" id="pendidikan" name="pendidikan" required autofocus value="{{ old('pendidikan') }}">
                        @error ('pendidikan')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div> -->

                      <!-- <div class="mb-3 col-lg-6">
                        <label for="divisi" class="form-label">Divisi</label>
                        <input type="text" class="form-control @error('divisi') is-invalid @enderror" id="divisi" name="divisi" required autofocus value="{{ old('divisi') }}">
                        @error ('divisi')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div> -->

                      

                      <!-- <div class="mb-3 col-lg-6">
                        <label for="jabatan" class="form-label">Jabatan</label>
                        <input type="text" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan" required autofocus value="{{ old('jabatan') }}">
                        @error ('jabatan')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div> -->

                      <div class="mb-4 col-lg-6">
                        <label for="jabatan" class="form-label">Jabatan</label>
                        <select name="jabatan" id="jabatan" class="form-control-sm form-control">
                                <option value="">Please select</option>
                                <option value="Director">Director</option>
                                <option value="HRD & Admin Umum">HRD & Admin Umum</option>
                                <option value="Admin Project">Admin Project</option>
                                <option value="Electrical">Electrical</option>
                                <option value="Electronic">Electronic</option>
                                <option value="VAC & Escalator">VAC & Escalator</option>
                                <option value="Survey & Report">Survey & Report</option>
                            </select>
                      </div>

                      <div class="mb-3 col-lg-6">
                        <label for="fileUrl" class="align-text-bottom">Upload File<i class="text-collor-red text-danger"> (max 2mb)</i></label>
                        <input class="form-control" type="file" id="file_pendukung" name="file_pendukung"/>
                        </div>
                      

                      <div class="mb-3 col-lg-6">
                        <label for="alamat_ktp" class="form-label">Alamat KTP</label>
                        <textarea name="alamat_ktp" id="alamat_ktp" rows="4" placeholder="Kp. Parung Serab RT002/RW010 Kel. Sudimara Selatan Kec. Ciledug Kota Tangerang" class="form-control @error('alamat_ktp') is-invalid @enderror" required value="{{ old('alamat_ktp') }}"></textarea>
                        @error ('alamat_ktp')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>

                      <div class="mb-3 col-lg-6">
                        <label for="alamat_domisili" class="form-label">Alamat Domisili <i>(tempat tinggal)</i></label>
                        <textarea name="alamat_domisili" id="alamat_domisili" rows="4" placeholder="Kp. Parung Serab RT002/RW010 Kel. Sudimara Selatan Kec. Ciledug Kota Tangerang" class="form-control @error('alamat_domisili') is-invalid @enderror" required value="{{ old('alamat_domisili') }}"></textarea>
                        <!-- <input type="text" class="form-control @error('alamat_domisili') is-invalid @enderror" id="alamat_domisili" name="alamat_domisili" required autofocus value="{{ old('alamat_domisili') }}"> -->
                        @error ('alamat_domisili')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>

                      <div class="mb-3">
                      <a href="/dashboard/clients" class="btn btn-danger"><span class="align-text-center "><i class="fa fa-arrow-left"></i></span> Batal</a>
                      <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                      </div>  
                    </form>
                    </div>
                    </div>
                </div>
              </div>
            </div>
@endsection
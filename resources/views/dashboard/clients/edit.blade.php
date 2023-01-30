@extends('dashboard.layouts.main')
@section('container')
<div class="breadcrumbs">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title text-center mt-2">
                            <h3>Edit Client</h3>
                        </div>
                    </div>
                </div>
            </div>
          
            <div class="col-lg-12">
            <div class="col-lg-8">
              <div class="card">
                <div class="card-header"><strong>Company</strong><small> Form</small></div>
                    <div class="card-body card-block">
                      <form method="post" action="/dashboard/clients/{{ $client->id }}" enctype="multipart/form-data" class="mb-5">
                      @method ('put')
                        @csrf
                      <div class="mb-3">
                        <label for="kode_client" class="form-label">Kode Client</label>
                        <input type="text" class="form-control @error('kode_client') is-invalid @enderror" id="kode_client" name="kode_client" required readonly value="{{ $client->kode_client }}">
                      </div>
                      
                      <div class="mb-3">
                        <label for="company_name" class="form-label">Company Name</label>
                        <input type="text" class="form-control @error('company_name') is-invalid @enderror" id="company_name" name="company_name" required autofocus value="{{ old('company_name', $client->company_name) }}">
                        @error ('name')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>

                      <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" required autofocus value="{{ old('alamat', $client->alamat) }}">
                        @error ('alamat')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>

                      <div class="mb-3">
                        <label for="contact_person" class="form-label">Contact Person</label>
                        <input type="text" class="form-control @error('contact_person') is-invalid @enderror" id="contact_person" name="contact_person" required autofocus value="{{ old('contact_person', $client->contact_person) }}">
                        @error ('contact_person')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>

                      <div class="mb-3">
                        <label for="jabatan_cp" class="form-label">Jabatan CP</label>
                        <input type="text" class="form-control @error('jabatan_cp') is-invalid @enderror" id="jabatan_cp" name="jabatan_cp" required autofocus value="{{ old('jabatan_cp', $client->jabatan_cp) }}">
                        @error ('jabatan_cp')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>

                      <div class="mb-3">
                        <label for="kota" class="form-label">Kota</label>
                        <input type="text" class="form-control @error('kota') is-invalid @enderror" id="kota" name="kota" required autofocus value="{{ old('kota', $client->kota) }}">
                        @error ('kota')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>

                      <div class="mb-3">
                        <label for="no_tlp" class="form-label">No. Telpon</label>
                        <input type="text" class="form-control @error('no_tlp') is-invalid @enderror" id="no_tlp" name="no_tlp" required autofocus value="{{ old('no_tlp', $client->no_tlp) }}">
                        @error ('no_tlp')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                      <a href="/dashboard/clients" class="btn btn-danger"><span class="align-text-center "><i class="fa fa-arrow-left"></i></span> Batal</a>
                      <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>                      
                    </form>
                    </div>
                    </div>
                </div>
              </div>
            </div>
@endsection
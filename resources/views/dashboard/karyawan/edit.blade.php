@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New User</h1>
      </div>

<div class="col-lg-8">
    <form method="post" action="/dashboard/karyawan/update" enctype="multipart/form-data" class="mb-5">
        @csrf
        <div class="mb-3">
        <label for="nik" class="form-label">Nomor Induk Karyawan</label>
        <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" required autofocus value="{{ $user->nik }}">
        @error ('name')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="name" class="form-label">Nama</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ $user->name }}">
        @error ('name')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required autofocus value="{{ $user->email }}">
        @error ('email')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="no_tlp" class="form-label">No. Tlp</label>
        <input type="text" class="form-control @error('no_tlp') is-invalid @enderror" id="no_tlp" name="no_tlp" required autofocus value="{{ $user->no_tlp }}">
        @error ('no_tlp')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>

      <div class="mb-3">
      <label for="level_user" class="form-label">Level User</label>
      <select class="form-select" name="level_user">
        <option value="manajer_proyek">Manajer Proyek</option>
        <option value="manajer_sales">Manajer Sales</option>
        <option value="tim_proyek">Tim Proyek</option>
        <option value="tim_sales" selected>Tim Sales</option>
      </select>
      </div>

      <div class="mb-3">
        <label for="jabatan" class="form-label">Jabatan</label>
        <input type="text" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan" required autofocus value="{{ $user->jabatan }}">
        @error ('jabatan')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>

      <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

</div>

@endsection
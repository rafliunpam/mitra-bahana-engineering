@extends('dashboard.layouts.main')
@section('container')
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h2>Data karyawan</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

      @if(session()->has('success'))
      <div class="alert alert-success col-lg-8" role="alert">
        {{ session('success') }}
      </div>
      @elseif(session()->has('danger'))
      <div class="alert alert-danger col-lg-8" role="alert">
        {{ session('danger') }}
      </div>
      @else
      @endif


      <div class="table-responsive col-lg-12">
        <a href="/dashboard/karyawan/create" class="btn btn-primary mb-3">Create New</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">NIK</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">No. Tlp</th>
              <th scope="col">Level employee</th>
              <th scope="col">Jabatan</th>
              <th scope="col">Status</th>

              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>

          @foreach ($employees as $employee)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $employee->nik }}</td>
            <td>{{ $employee->name }}</td>
            <td>{{ $employee->email }}</td>
            <td>{{ $employee->no_tlp }}</td>
            <td>{{ $employee->alamat }}</td>
            <td>{{ $employee->jabatan }}</td>
            <td class="text-center">
                @if($employee->status == "1")
                <label class=" badge label bg-success text-white">Active</label>
                @else($employee->status == "0")
                <label class=" badge label bg-danger text-white">Non-Active</label>
                @endif
            </td>
            <td>
              <a href="/dashboard/karyawan/{{ $employee->id }}/edit" class="badge fa fa-edit bg-dark text-white"><span class="align-text-bottom"></span></a> |
              @if($employee->status == "1")
              <a href="/dashboard/karyawan/{{ $employee->id }}" class="badge fa fa-times bg-warning text-white" onclick="return confirm ('Non-Aktifkan NIK : {{ $employee->nik }} Nama : {{ $employee->name }}?')"><span class="align-text-bottom"></span></a>
              @else($employee->status == "0")
              <a href="/dashboard/karyawan/{{ $employee->id }}" class="badge bg-primary text-white fa fa-check" onclick="return confirm ('Aktifkan Karyawan  NIK : {{ $employee->nik }} Nama : {{ $employee->name }}?')"><span class="align-text-bottom"></span></a>
              @endif
            </td>
          </tr>
          @endforeach

          </tbody>
        </table>
      </div>
</div>
@endsection
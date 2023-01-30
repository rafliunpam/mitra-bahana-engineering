@extends('dashboard.layouts.main')


@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tiket Proyek</h1>
      </div>

      
      @if(session()->has('success'))
      <div class="alert alert-success col-lg-8" role="alert">
        {{ session('success') }}
      </div>

      @endif


      <div class="table-responsive col-lg-8">
        <a href="/dashboard/tikets/create" class="btn btn-primary mb-3">Create New Tiket</a>
        <a href="/dashboard/tikets/tahapans" class="btn btn-warning mb-3 text-white">Detail Tiket</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Proyek</th>
              <th scope="col">Client</th>
              <th scope="col">Penanggung Jawab</th>
              <th scope="col">Tahapan</th>
              <th scope="col">Status</th>
              <th scope="col">Tanggal Mulai</th>
              <th scope="col">Tanggal Update</th>

              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($tikets as $tiket)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $tiket->client->company_name }}</td>
            <td>{{ $tiket->client->name}}</td>
            <td>{{ $tiket->user->name }}</td>
            <td>{{ $tiket->tahapan->name }}</td>
            <td>{{ $tiket->Status }}</td>
            <td>{{ $tiket->created_at }}</td>
            <td>{{ $tiket->updated_at }}</td>

            <td>
              <a href="" class="badge bg-info"><span data-feather="eye" class="align-text-bottom"></span></a>
              <a href="/edit" class="badge bg-warning"><span data-feather="edit" class="align-text-bottom"></span></a>

              <form action="" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button class="badge bg-danger border-0" onclick="return confirm ('Apakah Anda Yakin Ingin Mengahpus Postingan?')">
              <span data-feather="x-circle" class="align-text-bottom"></span>
              </button>
              </form>
            </td>
          </tr>
          @endforeach

          </tbody>
        </table>
      </div>
      @endsection
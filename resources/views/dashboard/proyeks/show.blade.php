@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Proyek : {{ $proyek->title }}</h1>
    </div>

    <a href="/dashboard/proyeks" class="btn btn-white border-dark border-2"><span data-feather="arrow-left" class="align-text-bottom"></span>Kembali</a>

    <a href="/dashboard/proyeks/{{ $proyek->id }}/update" class="btn btn-white border-dark border-2"><span data-feather="edit" class="align-text-bottom"></span>Update</a>

<div class="col-lg-12">
    <form method="post" action="/dashboard/proyekReq" enctype="multipart/form-data" class="mb-5">
        
        @csrf

    <table class="table table-striped table-sm">
        <thead>
            <tr>
            <th scope="col">No Tiket Proyek</th>
            <th scope="col">Client</th>
            <th scope="col">Tim Proyek</th>
            </tr>
        </thead>
        <tbody>
        <tr>
            <td>
            <input type="text" class="form-control bg-white" id="no_tiket_proyek" name="no_tiket_proyek" value="{{ $proyek->no_tiket_proyek }}" readonly>
            </td>
            <td>
            <input type="text" class="form-control bg-white" id="client" name="client" value="{{ $proyek->donesale->sale->client->company_name }}" readonly>
            </td>
            <td>
            <input type="text" class="form-control bg-white" id="client" name="client" value="{{ $proyek->user->name }}" readonly>
            </td>
            <tr></tr>
        </tr>
        </tbody>
        </table>

        <div class="table-responsive col-lg-12">
            
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Tahapan</th>
              <th scope="col">Keterangan</th>
              <th scope="col" class="text-center">Status</th>
              <th scope="col" class="text-center">File</th>
              <th scope="col" class="text-center">Tanggal</th>

            </tr>
          </thead>
          <tbody>
          @foreach ($statuses as $status)
          @if($status->proyek_id == "{$proyek->id}")
          <tr>
            <td>{{ $status->tahapan }}</td>
            <td>{{ $status->keterangan }}</td>
            <td class="text-center">
            @if($status->status == "1")
            <label class="badge bg-danger" type="text"> Unprocessed</label>
            @else($status->status == "0")
            <label class="badge bg-success" type="text"> Done</label>
            @endif
            </td>

            <td class="text-center">
            @if($status->file == NULL)
            <label class="badge bg-dark" type="text">Not Uploaded</label>
            @else($status->file !== NULL)
            <a class="badge bg-primary" href="/storage/{{ $status->file }}">Download<span data-feather="file-text" class="align-text-center "></span></a>
            @endif
            </td>

            <td class="text-center">
                {{ $status->updated_at }}
            </td>

          </tr>
          @else
          @endif
          @endforeach
          </tbody>
        </table>
      </div>






<!-- 
        <table class="table table-bordered" id="dynamicAddRemove">
            <tr>
                <th>Tahapan</th>
                <th>Keterangan</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            <tr>
                <td>
                    @foreach ($statuses as $status)
                    @if($status->proyek_id == "{$proyek->id}")
                    <input type="text" class="form-control bg-white" id="client" name="client" value="{{ $status->tahapan }}" readonly>
                    @else
                    @endif
                    @endforeach
                </td>

                <td>
                @foreach ($statuses as $status)
                    @if($status->proyek_id == "{$proyek->id}")
                    <input type="text" class="form-control bg-white" id="client" name="client" value="{{ $status->keterangan }}" readonly>
                    @else
                    @endif
                    @endforeach
                </td>

                <td>
                @foreach ($statuses as $status)
                    @if($status->proyek_id == "{$proyek->id}")
                    @if($status->status == "0")
                    <input type="text" class="form-control bg-white" id="client" name="client" value="Unprocess" readonly>
                    @elseif($status->status == "1")
                    <input type="text" class="form-control bg-white" id="client" name="client" value="Done" readonly>
                    @else
                    @endif
                    @endif
                    @endforeach
                </td>
                
                <td>
                    <button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Selesai</button>
                </td>

            </tr>
        </table> -->

    </div>

@endsection
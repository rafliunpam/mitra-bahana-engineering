@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Update Status : <label class="badge badge-dark">{{ $status->tahapan }}</label></h1>
</div>

<div class="col-lg-8">
  <form method="post" action="/dashboard/proyeks/statuses/{{ $status->id }}" enctype="multipart/form-data" class="mb-5">
  @method ('put')
    @csrf

    <div class="mb-3">
        <input type="text" class="form-control" id="proyek" name="proyek" value="{{ $status->proyek->title }}" hidden>
      </div>
      <div class="mb-3">
        <input type="text" class="form-control" id="proyek_id" name="proyek_id" value="{{ $status->proyek->id }}" hidden>
      </div>

    <div class="mb-3">
    <label for="keterangan" class="form-label">keterangan</label>
    <textarea type="text" name="keterangan" class="form-control bg-white" id="keterangan" rows="3" readonly>{{ $status->keterangan }}</textarea>
    </div>  

      <div class="form-group mb-3">
                <label for="fileUrl"><span data-feather="file-text" class="align-text-bottom"></span> Upload File (max 2mb)</label>
                  <div class="col-5 mb-3 mt-3">
                  </div>
                  <div class="col-6">
                    <input class="form-control @error('file') is-invalid @enderror" type="file" id="file" name="file"/>
                    @error ('file')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
              </div>

</div>
      

      <button type="submit" class="btn btn-outline-primary">Simpan</button>
    </form>



@endsection
@extends('dashboard.layouts.mainjsdynamic')


@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Create New Proyek</h1>
</div>

  <div class="col-lg-8">
  <form method="post" action="/dashboard/proyekReq" enctype="multipart/form-data" class="mb-5">
    @csrf
    <input type="text" class="form-control bg-white" id="proyek_id" name="proyek_id" value="{{$id}}" readonly>
    <input type="text" class="form-control bg-white" id="donesale_id" name="donesale_id" value="{{$donesale->id}}" readonly>

      <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No Tiket Proyek</th>
              <th scope="col">Client</th>
            </tr>
          </thead>
          <tbody>
          <tr>
            <td>
              <input type="text" class="form-control bg-white" id="no_tiket_proyek" name="no_tiket_proyek" value="PRY{{date('dmy').$kp}}" readonly>
            </td>
            <td>
              <input type="text" class="form-control bg-white" id="client" name="client" value="{{ $donesale->sale->client->company_name }}" readonly>
            </td>
            <tr></tr>
          </tr>
          </tbody>
        </table>


      <div class="mb-3">
        <label for="user" class="form-label">Tim Proyek</label>
        <select class="form-select" name="user_id">
         @foreach ($users as $user)
         @if($user->level_user == "tim_proyek")
           @if(old('user_id') == $user->id)
          <option value="{{ $user->id }}" selected>{{ $user->employee->name }}</option>
          @else
          <option value="{{ $user->id }}">{{ $user->employee->name }}</option>          
          @endif
          @else
          @endif
        @endforeach
        </select>
        </div>


      <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title') }}">
        @error ('title')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>

      <table class="table table-bordered" id="dynamicAddRemove">
                <tr>
                    <th>Tahapan</th>
                    <th>Keterangan</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <td><input for="tahapan" id="tahapan"type="text" name="addMoreInputFields[0][tahapan]" placeholder="BAST" class="form-control" />
                    </td>

                    <td><input for="keterangan" id="keterangan"type="text" name="addMoreInputFields[0][keterangan]" placeholder="Keterangan" class="form-control" />
                    </td>
                    
                    <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Tambah</button></td>
                </tr>
            </table>

        <div class="form-group mb-3">
                <label for="fileUrl"><span data-feather="file-text" class="align-text-bottom"></span> Upload File SPK.pdf (max 2mb)</label>
                  <div class="col-5 mb-3 mt-3">
                  </div>
                  <div class="col-6">
                    <input class="form-control" type="file" id="file" name="file"/>
                </div>
              </div>
      
      <div>

            <button type="submit" class="btn btn-success">Create Tiket</button>

            <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript">
            var i = 0;
            $("#dynamic-ar").click(function () {
                ++i;
                $("#dynamicAddRemove").append('<tr><td><input for="tahapan" id="tahapan"type="text" name="addMoreInputFields[' + i +
                    '][tahapan]" placeholder="BAST" class="form-control" /></td><td><input for="keterangan" id="keterangan"type="text" name="addMoreInputFields[' + i +
                    '][keterangan]" placeholder="Keterangan" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Hapus</button></td></tr>');
            });
            $(document).on('click', '.remove-input-field', function () {
                $(this).parents('tr').remove();
            });
            
        </script>    -->




@endsection
@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Create New Tiket Sales</h1>
</div>

  <div class="col-lg-8">
  <form method="post" action="/dashboard/sales" enctype="multipart/form-data" class="mb-5">
    @csrf

    <div class="mb-3">
        <label for="no_tiket_sales" class="form-label">Nomor Tiket Sales</label>
        <input type="text" class="form-control @error('no_tiket_sales') is-invalid @enderror" id="no_tiket_sales" name="no_tiket_sales" value="{{time().date('my')}}" readonly>
        @error ('no_tiket_sales')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>

    <div class="mb-3">
      <label for="client_id" class="form-label">Client</label>
      <select class="form-select" name="client_id" id="client_id">
       @foreach ($clients as $client)
         @if(old('client_id') == $client->id)
        <option value="{{ $client->id }}" selected>{{ $client->company_name }}</option>
        @else
        <option value="{{ $client->id }}">{{ $client->company_name }}</option>
        @endif
      @endforeach
      </select>
      </div>


      <div class="mb-3">
      <label for="user_id" class="form-label">Tim Sales</label>
      <select class="form-select" name="user_id" id="user_id">
       @foreach ($users as $user)
       @if($user->level_user == "tim_sales")
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


<!-- 
      <table class="table table-bordered" id="dynamicAddRemove">
                <tr>
                    <th>Tahapan</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <td><input for="status" id="status" type="text" name="status[0][status]" placeholder="Enter subject" class="form-control" />
                    </td>
                    <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Tambah</button></td>
                </tr>
            </table> -->
      <button type="submit" class="btn btn-success">Create Tiket</button>
      </div>



            




<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr><td><input for="status" id="status"type="text" name="status[' + i +
            '][status]" placeholder="Enter subject" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Hapus</button></td></tr>'
            );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
    
</script>

@endsection
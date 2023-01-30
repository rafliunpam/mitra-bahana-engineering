@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Create New Proyek</h1>
</div>

  <div class="col-lg-8">
  <form method="post" action="/dashboard/statuses" enctype="multipart/form-data" class="mb-5">
    @csrf

    <div class="mb-3">
        <input type="hidden" class="form-control " id="proyek_id" name="proyek_id" value="{{ $proyek->id }}">
      </div>

      <h3 class="mb-3 text-right" >{{ $proyek->title }}</h3>
            <table class="table table-bordered" id="dynamicAddRemove">
                <tr>
                    <th>Tahapan</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <td><input for="proses" id="proses"type="text" name="addMoreInputFields[0][status]" placeholder="Enter status" class="form-control" />
                    </td>
                    <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Tambah</button></td>
                </tr>
            </table>
            <button type="submit" class="btn btn-success">Create Tahapan</button>




<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr><td><input for="proses" id="proses"type="text" name="addMoreInputFields[' + i +
            '][status]" placeholder="Enter status" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Hapus</button></td></tr>'
            );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
    
</script>
@endsection
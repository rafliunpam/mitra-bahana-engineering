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
            <div class="col-lg-8">
              <div class="card">
                <div class="card-header"><strong>Tiket Proyek</strong><small> Form</small></div>
                    <div class="card-body card-block">
                      <form method="post" action="/dashboard/proyeks" enctype="multipart/form-data" class="mb-5">
                        @csrf
                        <input type="text" class="form-control bg-white" id="proyek_id" name="proyek_id" value="{{$id}}" readonly hidden>
                        

                      <div class="mb-3">
                      <label for="donesale_id" class="form-label badge badge-primary">Client</label>
                          <select data-placeholder="Please Select Client..." class="standardSelect" name="donesale_id" id="donesale_id" tabindex="1">
                          @foreach ($donesales as $donesale)
                          @if($donesale->status == "0")
                          <option value=""></option>
                          <option value="{{$donesale->id}}">
                            {{$donesale->sale->client->company_name}}
                            | {{$donesale->sale->no_tiket_sales}}
                            | {{$donesale->sale->user->employee->name}}
                          </option>
                          @else
                          @endif
                            @endforeach
                          </select>
                      </div>

                      <div class="mb-3">
                      <label for="user_id" class="form-label badge badge-primary">Tim Sales</label>
                          <select data-placeholder="Please Select User..." class="standardSelect" tabindex="1" name="user_id" id="user_id">
                          @foreach ($users as $user)
                          @if($user->level_user == "tim_proyek")
                            @if(old('user_id') == $user->id)
                            <option value="{{ $user->id }}" selected>{{ $user->employee->name }}</option>
                            @else
                            <option value=""></option>
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

                      <!-- <div class="mb-3 ">
                        <div class="col-lg-8 mb-3">                        
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" required autofocus value="{{ old('harga') }}">
                        @error ('harga')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                        @enderror
                        </div>

                        <div class="col-lg-4 mb-3">                        
                        <label for="ppn" class="form-label">PPN(%)</label>
                        <input type="number" class="form-control @error('ppn') is-invalid @enderror" id="ppn" name="ppn" placeholder="%"required autofocus value="{{ old('ppn') }}">
                        @error ('ppn')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                        @enderror
                        </div>
                      </div> -->

                      <div class="form-group mb-4">
                          <label for="fileUrl" class="fa fa-file-text-o"> File SPK :
                            Upload File (max 2mb)
                          </label>
                          <input class="form-control-file" type="file" id="file" name="file" />
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

                      <a href="/dashboard/sales" class="btn btn-danger"><span class="align-text-center "><i class="fa fa-arrow-left"></i></span> Batal</a>
                      <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>  
                    </form>
                    </div>
                    </div>
                </div>
              </div>
            </div>
            
            

            <!-- <script src="/AdminSufee/vendors/chosen/chosen.jquery.min.js"></script>
        <script>
            jQuery(document).ready(function() {
                jQuery(".standardSelect").chosen({
                    disable_search_threshold: 1,
                    no_results_text: "Oops, nothing found!",
                    width: "100%"
                });
            });
        </script> -->

        <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
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
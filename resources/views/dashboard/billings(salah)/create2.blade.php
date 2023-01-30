@extends('dashboard.layouts.main')

@section('container')
<div class="breadcrumbs">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title text-center mt-2">
                            <h3>Create New Invoice</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
            <div class="col-lg-8">
              <div class="card">
                <div class="card-header"><strong>
                    @foreach($statuses as $status)
                    {{ $status->proyek->title }}
                </strong><small> {{ $status->proyek->no_tiket_proyek }}</small></div>
                @break
                @endforeach
                    <div class="card-body card-block">

                      <div class="mb-3">
                      <label for="tiket_proyek" class="form-label badge badge-primary">Tiket Proyek</label>
                          <select data-placeholder="Please Select User..." class="standardSelect" tabindex="1" name="category" id="category">
                          @foreach ($proyeks as $proyek)
                            @if(old('keterangan') == $proyek->id)
                            <option value="{{ $proyek->id }}" selected>{{ $proyek->no_tiket_proyek }} | {{ $proyek->title }}</option>
                            @else
                            <option value=""></option>
                            <option value="{{ $proyek->id }}">{{ $proyek->no_tiket_proyek }}  | {{ $proyek->title }}</option>
                            @endif
                          @endforeach
                          </select>
                      </div>

                      <div class="mb-3">
                        <label for="keterangan" class="form-label badge badge-primary">Keterangan</label>
                            <select data-placeholder="Pilih Tahapan" multiple class="standardSelect">
                            @foreach ($statuses as $status)
                                @if(old('keterangan') == $status->id)
                                <option value="{{ $status->id }}" selected>{{ $status->keterangan }}</option>
                                @else
                                <option value=""></option>
                                <option value="{{ $status->id }}">{{ $status->keterangan }}</option>
                                @endif
                              @endforeach
                            </select>
                    </div>


                      <!-- <div class="mb-3">
                        <label for="title" class="form-label">Harga</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title') }}">
                        @error ('title')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                        @enderror
                      </div> -->

                      <div class="form-group">
                            <label>Category:</label>
                            <select name="category" id="category" class="form-control">
                                <option value="0">-- Select Cateory --</option>
                                @foreach($proyeks as $proyek)
                                    <option value="{{ $proyek->id }}">{{ $proyek->no_tiket_proyek }} | {{ $proyek->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Sub Category:</label>
                            <select name="sub_category" id="subCategory" class="form-control">
                                <option value="0">-- Select Sub Category --</option>
                            </select>
                        </div>
                        
                      <a href="/dashboard/sales" class="btn btn-danger"><span class="align-text-center "><i class="fa fa-arrow-left"></i></span> Batal</a>
                      <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>  
                    </form>
                    </div>
                    </div>
                </div>
              </div>
            </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
     
        <script type="text/javascript">
        $(document).ready(function () {
           $('#category').change(function () {
             var id = $(this).val();

             $('#subCategory').find('option').not(':first').remove();

             $.ajax({
                url:'proyek/'+id,
                type:'get',
                dataType:'json',
                success:function (response) {
                    var len = 0;
                    if (response.data != null) {
                        len = response.data.length;
                    }

                    if (len>0) {
                        for (var i = 0; i<len; i++) {
                             var id = response.data[i].id;
                             var keterangan = response.data[i].keterangan;

                             var option = "<option value='"+id+"'>"+keterangan+"</option>"; 

                             $("#subCategory").append(option);
                        }
                    }
                }
             })
           });
        });
    </script>




@endsection
@extends('dashboard.layouts.main')

@section('container')
<div class="breadcrumbs">
                <div class="col-sm-8">
                    <div class="page-header float-left">
                        <div class="page-title text-center mt-2">
                            <h3>{{$proyek->title}}</h3>
                        </div>
                    </div>
                </div>
            </div>
          
            <div class="col-lg-12">
            <div class="col-lg-8">
              <div class="card">
                <div class="card-header"><strong>Upload Invoice </strong><small> Form</small></div>
                    <div class="card-body card-block">
                      <form method="post" action="/dashboard/invoices" enctype="multipart/form-data" class="mb-5">
                        @method('post')
                        @csrf
                        <input type="text" class="form-control bg-white" id="proyek_id" name="proyek_id" value="{{$proyek->id}}" readonly hidden>
                        <input type="text" class="form-control bg-white" id="billing_id" name="billing_id" value="{{$id}}" readonly hidden>

                      <div class="mb-3">
                      <label for="status_id" class="form-label badge badge-primary">Tahapan</label>
                          <select multiple data-placeholder="Please Select ..." class="standardSelect" name="status_id[]" id="status_id" tabindex="1" required>
                          @foreach ($statuses as $status)
                          @if($status->status == 'Done')  
                          <option value="{{$status->id}}">{{$status->tahapan}}</option>
                          @endif
                            @endforeach
                          </select>
                      </div>

                      <div class="form-group mb-4">
                          <label for="fileUrl" class="fa fa-file-text-o"> File Invoice :
                            Upload Invoice (max 2mb)
                          </label>
                          <input class="form-control-file" type="file" id="file" name="file" required />
                        </div>

                      <a href="/dashboard/invoices" class="btn btn-danger"><span class="align-text-center "><i class="fa fa-arrow-left"></i></span> Batal</a>
                      <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>  
                    </form>
                    </div>
                    </div>
                </div>
              </div>
            </div>

@endsection
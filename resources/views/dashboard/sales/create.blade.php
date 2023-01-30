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
                <div class="card-header"><strong>Tiket Sales</strong><small> Form</small></div>
                    <div class="card-body card-block">
                      <form method="post" action="/dashboard/sales" enctype="multipart/form-data" class="mb-5">
                        @csrf

                      <div class="mb-3">
                      <label for="client_id" class="form-label badge badge-primary">Client</label>
                          <select data-placeholder="Please Select Client..." class="standardSelect" name="client_id" id="client_id" tabindex="1">
                          @foreach ($clients as $client)
                          <option value=""></option>
                              <option value="{{$client->id}}">{{$client->company_name}}</option>
                            @endforeach
                          </select>
                      </div>

                      <div class="mb-3">
                      <label for="client_id" class="form-label badge badge-primary">Tim Sales</label>
                          <select data-placeholder="Please Select User..." class="standardSelect" tabindex="1" name="user_id" id="user_id">
                          @foreach ($users as $user)
                          @if($user->level_user == "tim_sales")
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
@endsection
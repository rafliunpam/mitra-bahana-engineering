@extends('dashboard.layouts.main')
@section('container')
<div class="breadcrumbs">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title text-center mt-2">
                            <h3>Update Tiket</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header"><strong>Tikes Sales</strong><small> Form</small>
                  <button type="button" class="float-right btn btn-danger badge fa fa-exclamation-triangle" data-toggle="modal" data-target="#smallmodal"
                  > Cancle Tiket
                  </button>
                
                    
                    <div class="card-body card-block">
                      <form method="post" action="/dashboard/sales/{{ $sale->id }}" enctype="multipart/form-data" class="mb-5">
                        @method ('put')
                        @csrf
                        <div class="mb-3">

                        </div>
                          <table class="table table-striped table-sm">
                            <thead>
                              <tr>
                                <th scope="col">No. Tiket Sales</th>
                                <th scope="col">Tim Sales</th>
                                <th scope="col">Client</th>
                                <th scope="col">Status</th>
                                <th scope="col">Tanggal</th>
                              </tr>
                            </thead>
                            <tbody>
                            <tr>
                              <td>{{ $sale->no_tiket_sales }}</td>
                              <td>{{ $sale->user->employee->name }}</td>
                              <td>{{ $sale->client->company_name}}</td>
                              <td>{{ $sale->status}}</td>
                              <td>{{ $sale->updated_at }}</td>
                          </table>
                          
                        <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" rows="3" placeholder="please enter your information" class="form-control @error('keterangan') is-invalid @enderror" required value="{{ old('keterangan') }}">{{$sale->keterangan}}</textarea>
                        @error ('keterangan')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                        </div>


                        <div class="form-group mb-3">
                          <label for="fileUrl" class="fa fa-file-text-o"> File :
                            @if($sale->file !== NULL)
                            <a href="/storage/{{ $sale->file }}" class="badge badge-info"><span data-feather="file-text" class="fa fa-download"></span> Download</a>
                            @else
                            Upload File (max 2mb)
                            @endif
                          </label>
                          <input class="form-control-file" type="file" id="file" name="file" />
                        </div>

                        <div class="mb-3">
                          <a href="/dashboard/sales" class="btn btn-danger"><span class="align-text-center "><i class="fa fa-arrow-left"></i></span> Batal</a>                     

                        <button type="submit" class="btn btn-primary">Update Tiket</button>
                         
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              @cannot('tim_sales')
                @endcannot
            </div>


                

                </div>
            
            <form action="/dashboard/sales/cancle/{{ $sale->id }}" method="post" class="d-inline">
                  @method('put')
                  @csrf
            <div
                        class="modal fade"
                        id="smallmodal"
                        tabindex="-1"
                        role="dialog"
                        aria-labelledby="smallmodalLabel"
                        aria-hidden="true"
                    >
                        <div class="modal-dialog modal-sm" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5
                                        class="modal-title fa fa-exclamation-triangle"
                                        id="smallmodalLabel"
                                    >
                                        Cancle Tiket
                                    </h5>
                                    <button
                                        type="button"
                                        class="close"
                                        data-dismiss="modal"
                                        aria-label="Close"
                                    >
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" rows="3" placeholder="please enter your information" class="form-control @error('keterangan') is-invalid @enderror" required></textarea>
                        @error ('keterangan')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                                </div>
                                <div class="modal-footer">
                                    <button
                                        type="button"
                                        class="btn btn-secondary"
                                        data-dismiss="modal"
                                    >
                                        Cancel
                                    </button>
                                    <button class="btn btn-primary" onclick=" return confirm ('Apakah Anda Yakin Ingin Membatalkan Tiket No : {{ $sale->no_tiket_sales }} Client :{{ $sale->client->company_name }}?')"> Save
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
            </form>

            
@endsection
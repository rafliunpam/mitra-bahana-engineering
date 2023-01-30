@extends('dashboard.layouts.main')

@section('container')
<div class="breadcrumbs">
                <div class="col-sm-6">
                    <div class="page-header float-left">
                        <div class="page-title text-center mt-2">
                            <h3>Create New Invoice</h3>
                        </div>
                    </div>
                </div>
            </div>

            <form action="/dashboard/billings/" method="post" class="d-inline">
                    @method('post')
                    @csrf
            <div class="col-lg-12">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header"><strong>{{ $billing->proyek->title }}
                </strong><small> {{ $billing->proyek->no_tiket_proyek }}</small>
                <input class="float-right col-sm-2 small" name="no_invoice" id="no_invoice" value="{{$ni}}">
                <label for="no_invoice" class="float-right mr-2">KWITANSI NO. : </label>
            </div>
                    <div class="card-body card-block">
                    <input for="billing_id" id="billing_id"type="text" name="billing_id" placeholder="BAST" class="form-control" value="{{$billing->id}}"readonly hidden/>

                    <div class="mb-3">
                    <table class="table table-bordered" id="dynamicAddRemove">
                        <tr>
                            <th>Tahapan</th>
                            <th>Keterangan</th>
                            <th>Persentase</th>
                            <th>Pembayaran</th>
                        </tr>
                        @foreach ($statuses as $status)
                        <tr>
                            <td hidden><input for="status_id" id="status_id"type="text" name="status_id[]" placeholder="BAST" class="form-control" value="{{$status->id}}"readonly />
                            </td>

                            <td class="">{{ $status->tahapan }}
                            </td>

                            <td>{{ $status->keterangan }}
                            </td>

                            <td width="1px"><input for="persentase_pembayaran" id="persentase_pembayaran" type="number" name="persentase_pembayaran[]" placeholder="%" class="form-control" min="0" max="{{$maxp}}" required/>
                            </td>

                            <td width="150px"><input for="harga_pembayaran" id="harga_pembayaran" type="number" name="harga_pembayaran[]" placeholder="Rp.1.xxx.xxx" class="form-control" min="0" max="{{$st}}" required/>
                            </td>
                            
                            </td>
                        </tr>
                        @endforeach
                    </table>
                      </div>
                        
                      <a href="/dashboard/billings" class="btn btn-danger"><span class="align-text-center "><i class="fa fa-arrow-left"></i></span> Batal</a>
                      <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                    </div>
                    </div>
                </div>
              </div>
            </div>
            </form>

            <!-- <script>
        function harga_pembayaran(event) {
            var angka = (event.which) ? event.which : event.keyCode
            if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
                return false;
            return true;
        }
    </script> -->

@endsection
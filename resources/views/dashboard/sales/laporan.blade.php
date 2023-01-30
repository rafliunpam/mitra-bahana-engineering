@extends('dashboard.layouts.main')


@section('container')
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h2>Data Client</h2>
                    </div>
                </div>
            </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title"
                            >Laporan Selesai</strong
                        >
                        <button type="button" class="float-right btn btn-primary badge fa fa-print" data-toggle="modal" data-target="#smallmodal"
                        > Print
                        </button>
                    </div>
                    <div class="card-body">
                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>No Tiket Sales</th>
                                <th>Tim Sales</th>
                                <th>Client</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($donesales as $done)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $done->sale->no_tiket_sales }}</td>
                                    <td>{{ $done->sale->user->employee->name }}</td>
                                    <td>{{ $done->sale->client->company_name }}</td>
                                    <td><?= date ('d/M/Y H:i', strtotime($done['updated_at'])); ?></td>
                                </tr>
                                @endforeach
                                </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
</div>


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
                    <h4
                    class="modal-title fa fa-print"
                    id="smallmodalLabel"
                    >
                    Print
                </h4>
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
            <form action="/dashboard/sales/printLaporan" method="post" class="d-inline" target="_blank">
                      @method('get')
                      @csrf
                      <label for="tanggal_awal" class="form-label">Tanggal Awal</label>
                        <input type="date" class="form-control @error('tanggal_awal') is-invalid @enderror" id="tanggal_awal" name="tanggal_awal" required autofocus value="{{ old('tanggal_awal') }}">
                        @error ('tanggal_awal')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                        
                        <label for="tanggal_akhir" class="form-label mt-2">Tanggal Akhir</label>
                        <input type="date" class="form-control @error('tanggal_akhir') is-invalid @enderror" id="tanggal_akhir" name="tanggal_akhir" required autofocus value="{{ old('tanggal_akhir') }}">
                        @error ('tanggal_akhir')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                        </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary"> Print by Date
                                    </button>
                                </form>
                                <form action="/dashboard/sales/printLaporan"  target="_blank" method="post" class="d-inline mb-3 mr-3">
                                        @method ('get')
                                            @csrf
                                        <button  class="btn btn-success mt-3" onclick="return confirm ('Konfirmasi?')"
                                        > All
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                </div>

@endsection
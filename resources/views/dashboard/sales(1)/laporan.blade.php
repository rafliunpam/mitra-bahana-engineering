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
  <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Table</strong>
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
                                              <td>{{ $done->sale->user->name }}</td>
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

@endsection